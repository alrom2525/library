<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'url', 'icon',
    ];
    protected $guarded = ['id'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'menu_role');
    }
    
    public function getChildren($parents, $line)
    {
        $children = [];
        foreach ($parents as $line1) {
            if ($line['id'] == $line1['parent_menu']) {
                $children = array_merge($children, [array_merge($line1, ['submenu' => $this->getChildren($parents, $line1)])]);
            }
        }
        return $children;
    }

    public function getParents($front)
    {
        if ($front) {
            return $this->whereHas('roles', function ($query) {
                $query->where('role_id', session()->get('role_id'))->orderby('parent_menu');
            })->orderby('parent_menu')
                ->orderby('order')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('parent_menu')
                ->orderby('order')
                ->get()
                ->toArray();
        }
    }

    public static function getMenu($front = false)
    {
        $menus = new Menu();
        $parents = $menus->getParents($front);
        $menuAll = [];
        foreach ($parents as $line) {
            if ($line['parent_menu'] != 0)
                break;
            $item = [array_merge($line, ['submenu' => $menus->getChildren($parents, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }

    public function storeOrder($menu)
    {
        $menus = json_decode($menu);
        foreach ($menus as $var => $value) {
            $this->where('id', $value->id)->update(['parent_menu' => 0, 'order' => $var + 1]);
            if (!empty($value->children)) {
                foreach ($value->children as $key => $vchild) {
                    $update_id = $vchild->id;
                    $parent_id = $value->id;
                    $this->where('id', $update_id)->update(['parent_menu' => $parent_id, 'order' => $key + 1]);

                    if (!empty($vchild->children)) {
                        foreach ($vchild->children as $key => $vchild1) {
                            $update_id = $vchild1->id;
                            $parent_id = $vchild->id;
                            $this->where('id', $update_id)->update(['parent_menu' => $parent_id, 'order' => $key + 1]);

                            if (!empty($vchild1->children)) {
                                foreach ($vchild1->children as $key => $vchild2) {
                                    $update_id = $vchild2->id;
                                    $parent_id = $vchild1->id;
                                    $this->where('id', $update_id)->update(['parent_menu' => $parent_id, 'order' => $key + 1]);

                                    if (!empty($vchild2->children)) {
                                        foreach ($vchild2->children as $key => $vchild3) {
                                            $update_id = $vchild3->id;
                                            $parent_id = $vchild2->id;
                                            $this->where('id', $update_id)->update(['parent_menu' => $parent_id, 'order' => $key + 1]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
