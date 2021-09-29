@if (session('message'))
    <div class="alert bg-teal alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Messages système :</h5>
        <ul>
            <li>{{ session('message') }}</li>
        </ul>
    </div>
@endif