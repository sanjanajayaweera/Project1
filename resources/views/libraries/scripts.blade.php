
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script><!-- JAVASCRIPT -->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{asset('js/pages/dashboard.init.js')}}"></script>

<!-- Boxicons JS-->
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>

<!-- confirm JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- cropper JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>
<!-- App js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/sptoast.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>

<script>

    $(document).ready(function () {

        @foreach(['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-'.$msg))
        var msg = '@php echo Session("alert-".$msg); @endphp';
        @if($msg == 'success')
        setTimeout(() => {
            alertSuccess(msg);
        }, 500);
        @endif
        @if($msg == 'danger')
        setTimeout(() => {
            alertDanger(msg);
        }, 500);
        @endif
        @if($msg == 'info')
        setTimeout(() => {
            alertInfo(msg);
        }, 500);
        @endif
        @if($msg == 'warning')
        setTimeout(() => {
            alertWarning(msg);
        }, 500);
        @endif
        @endif
        @endforeach
    });

    function alertDanger(msg) {
        $.toast({
            heading: 'Oops',
            text: msg,
            icon: 'error',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            position: 'bottom-right',
        })
    }

    function alertSuccess(msg) {
        $.toast({
            heading: 'Success',
            text: msg,
            icon: 'success',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-center',
        })
    }

    function alertWarning(msg) {
        $.toast({
            heading: 'Warning',
            text: msg,
            icon: 'warning',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-right',
        })
    }

    function alertInfo(msg) {
        $.toast({
            heading: 'Attention',
            text: msg,
            icon: 'info',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-right',
        })
    }

    function delconf(url, title = "Do You Want To Remove This!", btnText = "Yes, Delete It ", msg =
        "Deleted Successfully", location = null) {
        $.confirm({
            title: 'Are You Sure,',
            content: title,
            autoClose: 'cancel|8000',
            type: 'red',
            confirmButton: "Yes",
            cancelButton: "Cancel",
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                tryAgain: {
                    text: btnText,
                    action: function () {
                        $.ajax({
                            url: url,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'GET',
                            success: function () {
                                sessionStorage.setItem("SessionSuccess",
                                    msg
                                );
                                if (location == null) {
                                    document.location.reload(true);
                                } else {
                                    window.location.href = location;
                                }
                            }
                        });
                    }
                },
                cancel: function () {}
            }
        });
    }

    function approve(url, title = "Do You Want To Approve It") {
        $.confirm({
            title: 'Are you sure,',
            content: title,
            autoClose: 'cancel|8000',
            type: 'green',
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes, Publish IT': function () {
                    window.location.href = url;
                    confirmButton: "Yes";
                    cancelButton: "Cancel";
                },
                cancel: function () {

                },

            }
        });
    }

    function decline(url, title = "Do You Want To Decline It") {
        $.confirm({
            title: 'Are you sure,',
            content: title,
            autoClose: 'cancel|8000',
            type: 'red',
            theme: 'material',
            backgroundDismiss: false,
            backgroundDismissAnimation: 'glow',
            buttons: {
                'Yes, Unpublish IT': function () {
                    window.location.href = url;
                },
                cancel: function () {

                },

            }
        });
    }

</script>



@yield('scripts')


