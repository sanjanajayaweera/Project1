

<div class="dropleft no-arrow mb-1">
    <a class="btn btn-sm btn-icon-only text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton" x-placement="bottom-start">
        <a class="dropdown-item edit-product" href="{{ route('product.edit',$id) }}" class="btn btn-warning"
            title="">
            <i class="fas fa-edimagesit"></i>&nbsp;Edit
        </a>
        <a class="dropdown-item delete-product" href="#" class="btn btn-danger" title=""
            onclick="delconf('{{ route('product.delete',$id) }}','Do You Want To Remove This!','Yes, Delete It' ,'Tag Deleted Successfully')"><i
                class="far fa-trash-alt"></i>&nbsp;Delete</a>
    </div>
</div>
