
<div class="dropleft no-arrow mb-1">
    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
        <a class="dropdown-item edit-product" href="{{route('category.edit',$id) }}" class="btn btn-warning"
            title="">
            <i class="fas fa-edit"></i>&nbsp;Edit
        </a>
        <a class="dropdown-item delete-product" href="#" class="btn btn-danger" title=""
            onclick="delconf('{{route('category.delete',$id) }}','Do You Want To Remove This!','Yes, Delete It' ,'Category Deleted Successfully')"><i
                class="far fa-trash-alt"></i>&nbsp;Delete</a>
    </div>
</div>
