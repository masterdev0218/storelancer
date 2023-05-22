<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>
        <?php echo $__env->yieldContent('page-title'); ?> -

        <?php if(trim($__env->yieldContent('page-title')) && Auth::user()->type == 'admin'): ?>
            <?php echo e(config('app.name', 'Taskly')); ?>

        <?php else: ?>
            <?php echo e(isset($currantWorkspace->company) && $currantWorkspace->company != '' ? $currantWorkspace->company : config('app.name', 'Taskly')); ?>

        <?php endif; ?>
    </title>

    <link rel="shortcut icon" href="<?php echo e(asset(Storage::url('logo/favicon.png'))); ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/iziToast.min.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/icons.min.css')); ?>">
    <link href="<?php echo e(asset('assets/css/easy-autocomplete.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>

<!-- Begin page -->
<div>

    <script>
        var dataTableLang = {
            paginate: {previous: "<i class='fas fa-angle-left'>", next: "<i class='fas fa-angle-right'>"},
            lengthMenu: "<?php echo e(__('Show')); ?> _MENU_ <?php echo e(__('entries')); ?>",
            zeroRecords: "<?php echo e(__('No data available in table.')); ?>",
            info: "<?php echo e(__('Showing')); ?> _START_ <?php echo e(__('to')); ?> _END_ <?php echo e(__('of')); ?> _TOTAL_ <?php echo e(__('entries')); ?>",
            infoEmpty: "<?php echo e(__('Showing 0 to 0 of 0 entries')); ?>",
            infoFiltered:   "<?php echo e(__('(filtered from _MAX_ total entries)')); ?>",
            search: "<?php echo e(__('Search:')); ?>",
            thousands:",",
            loadingRecords: "<?php echo e(__('Loading...')); ?>",
            processing: "<?php echo e(__('Processing...')); ?>"
        }
    </script>

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <?php echo $__env->make('partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </nav>
            <div class="main-sidebar">
                <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <footer class="main-footer">
                <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </footer>
        </div>
    </div>
</div>

<div id="commanModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCommanModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="modelCommanModelLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<?php if(Auth::user()->type != 'admin'): ?>
    <div id="modelCreateWorkspace" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelCreateWorkspaceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelCreateWorkspaceLabel"><?php echo e(__('Create Your Workspace')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="pl-3 pr-3" method="post" action="<?php echo e(route('add_workspace')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="workspacename"><?php echo e(__('Name')); ?></label>
                            <input class="form-control" type="text" id="workspacename" name="name" required="" placeholder="<?php echo e(__('Workspace Name')); ?>">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><?php echo e(__('Create Workspace')); ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
    \App::setLocale(env('DEFAULT_LANG'));
    $currantLang = 'en';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
<script>
    moment.locale('<?php echo e($currantLang); ?>');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<?php if($currantLang != '' && $currantLang != 'en'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-<?php echo e($currantLang); ?>.min.js"></script>
    <script>$.datepicker.setDefaults($.datepicker.regional['<?php echo e($currantLang); ?>']);</script>
<?php endif; ?>
<?php if(env('CHAT_MODULE') == 'yes' && isset($currantWorkspace) && $currantWorkspace): ?>
    <?php if(auth()->guard('web')->check()): ?>
    
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script>
        $(document).ready(function () {
            pushNotification('<?php echo e(Auth::id()); ?>');
        });

        function pushNotification(id) {

            // ajax setup form csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;

            var pusher = new Pusher('<?php echo e(env('PUSHER_APP_KEY')); ?>', {
                cluster: '<?php echo e(env('PUSHER_APP_CLUSTER')); ?>',
                forceTLS: true
            });

            var channel = pusher.subscribe('<?php echo e($currantWorkspace->slug); ?>');
            channel.bind('notification', function (data) {

                if (id == data.user_id) {
                    $(".notification-toggle").addClass('beep');
                    $(".notification-dropdown .dropdown-list-icons").prepend(data.html);
                }
            });
            channel.bind('chat', function (data) {
                if (id == data.to) {
                    getChat();
                }
            });
        }

        function getChat() {
            $.ajax({
                url: '<?php echo e(route('message.data',$currantWorkspace->slug)); ?>',
                type: "get",
                cache: false,
                success: function (data) {
                    if (data.length != 0) {
                        $(".message-toggle").addClass('beep');
                        $(".dropdown-list-message").html(data);
                        LetterAvatar.transform();
                    }
                }
            })
        }

        getChat();

        $(document).on("click", ".mark_all_as_read", function () {
            $.ajax({
                url: '<?php echo e(route('notification.seen',$currantWorkspace->slug)); ?>',
                type: "get",
                cache: false,
                success: function (data) {
                    $('.notification-dropdown .dropdown-list-icons').html('');
                    $(".notification-toggle").removeClass('beep');
                }
            })
        });
        $(document).on("click", ".mark_all_as_read_message", function () {
            $.ajax({
                url: '<?php echo e(route('message.seen',$currantWorkspace->slug)); ?>',
                type: "get",
                cache: false,
                success: function (data) {
                    $('.dropdown-list-message').html('');
                    $(".message-toggle").removeClass('beep');
                }
            })
        });
    </script>
    
    <?php endif; ?>
<?php endif; ?>

<script src="<?php echo e(asset('assets/js/iziToast.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollreveal.min.js')); ?>"></script>
<script>var userID = "<?php echo e(Auth::id()); ?>";</script>
<script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>
<script>
    var calender_header = {
        today: "<?php echo e(__('today')); ?>",
        month: '<?php echo e(__('month')); ?>',
        week: '<?php echo e(__('week')); ?>',
        day: '<?php echo e(__('day')); ?>',
        list: '<?php echo e(__('list')); ?>'
    };
</script>

<?php if(isset($currantWorkspace) && $currantWorkspace): ?>
    <script src="<?php echo e(asset('assets/js/jquery.easy-autocomplete.min.js')); ?>"></script>
    <script>
        var options = {
            url: function (phrase) {
                return "<?php if(auth()->guard('web')->check()): ?><?php echo e(route('search.json',$currantWorkspace->slug)); ?><?php elseif(auth()->guard()->check()): ?><?php echo e(route('client.search.json',$currantWorkspace->slug)); ?><?php endif; ?>/" + phrase;
            },
            categories: [
                {
                    listLocation: "Projects",
                    header: "<?php echo e(__('Projects')); ?>"
                },
                {
                    listLocation: "Tasks",
                    header: "<?php echo e(__('Tasks')); ?>"
                }
            ],
            getValue: "text",
            template: {
                type: "links",
                fields: {
                    link: "link"
                }
            }
        };
        $(".search-element input").easyAutocomplete(options);
    </script>
<?php endif; ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php if($message = Session::get('success')): ?>
    <script>toastr('<?php echo e(__('Success')); ?>', '<?php echo $message; ?>', 'success')</script>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
    <script>toastr('<?php echo e(__('Error')); ?>', '<?php echo $message; ?>', 'error')</script>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
    <script>toastr('<?php echo e(__('Info')); ?>', '<?php echo $message; ?>', 'info')</script>
<?php endif; ?>
<?php if($message = Session::get('warning')): ?>
    <script>toastr('<?php echo e(__('Warning')); ?>', '<?php echo $message; ?>', 'warning')</script>
<?php endif; ?>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/layouts/main.blade.php ENDPATH**/ ?>