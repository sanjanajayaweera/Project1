@extends('layouts.app')
@section('title')
<div class="row  py-4">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="col-lg-6 col-7">
                <h2 class="h2 text-dark d-inline-block mb-0">Tag Management <small>[new]</small></h2>
                <nav aria-label="breadcrumb" class="d-none d-md-block mt-2">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tag Management</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</div>

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 ml-5 ">
        <div class="card">
            <div class="card-body">
                <form action="{{route('tag.store')}}" enctype="multipart/form-data" method="post" id="activity-type-data">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="inp_title"><b>Title </b> </label>
                                <input id="inp_title" class="form-control" type="text" name="title"
                                    placeholder="Enter a title">
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inp_description"><b>Description</b> </label>
                                        <textarea id="inp_description" class="form-control" type="text" name="description"
                                            placeholder="Enter a description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="inp_image" class="form-control-label"><b>Image <sup
                                                    class="text-danger">*</sup></b> </label>
                                        <input type="file" class="form-control" name="image" id="inp_image"
                                            accept="image/jpg, image/jpeg, image/png" aria-describedby="helpId"
                                            placeholder="" onchange="readImageURLSlide(this);">
                                    </div>

                                    <div class="col-lg-10  cropping-elements d-none mb-4">
                                        <div class="image_container">
                                            <img id="inp_image_pre" src="#" style="width:100%" alt="your image" />
                                        </div>
                                    </div>
                                <div>   
                                    <input type="hidden" name="x1" id="inp_x1">
                                    <input type="hidden" name="y1" id="inp_y1">
                                    <input type="hidden" name="h" id="inp_h">
                                    <input type="hidden" name="w" id="inp_w">
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h6 class="text-center responsive-moblile">
                                            <span id="activityType-form-span"></span>
                                            <input id="submit-btn" type="submit" class="btn btn-success" value="Create">
                                        </h6>
                                    </div>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function readImageURLSlide(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#inp_image_pre').attr('src', e.target.result)
                initCropper();
            };
            reader.readAsDataURL(input.files[0]);
        }
        $('.cropping-elements').removeClass('d-none');
    }

    function initCropper() {
        var $image = $('#inp_image_pre'),
            height = $image.height() + 4;
        $image.cropper('destroy');

        $('.preview').css({
            width: '100%',
            overflow: 'hidden',
            height: '200px',
            maxWidth: $image.width(),
            maxHeight: '200px'
        });

        $image.cropper({
            aspectRatio: 16 / 9,
            preview: '.preview',
            crop: function (event) {
                $('#inp_x1').val(event.detail.x);
                $('#inp_y1').val(event.detail.y);
                $('#inp_w').val(event.detail.width);
                $('#inp_h').val(event.detail.height);
            },
            ready: function (e) {
                $(this).cropper('setData', {
                    height: 467,
                    rotate: 0,
                    scaleX: 1,
                    scaleY: 1,
                    width: 573,
                    x: 469,
                    y: 19
                });
            }
        });
    }

</script>
@endsection

