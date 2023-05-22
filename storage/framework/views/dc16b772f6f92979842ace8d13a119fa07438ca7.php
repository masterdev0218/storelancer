<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Storelancer Page Builder</title>
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('custom/css/page-builder.css')); ?>">
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" />

</head>

<body>
    <div id="gjs"></div>

    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-preset-webpage"></script>
    <script src="https://unpkg.com/grapesjs-preset-newsletter"></script>
    <script type="text/javascript">
        <?php if(!request()->session()->get('token')): ?>
            const token = "<?php echo e(request()->user()->createToken('authToken')->plainTextToken); ?>";
            localStorage.setItem('token', token);
        <?php endif; ?>

        var pId = document.URL.split("/")
        var editor = grapesjs.init({
            container: '#gjs',
            plugins: ['grapesjs-preset-webpage', 'grapesjs-preset-newsletter'],
            storageManager: {
                type: 'local',
                options: {
                    local: {
                        key: `gjsProject-${pId[pId.length-1]}`
                    }
                }
            },
        });

        editor.Panels.addButton('options',
            [{
                    id: 'save-db',
                    className: 'fas fa-save',
                    command: 'save-db',
                    attributes: {
                        title: 'Save Changes'
                    },
                    async command(editor) {
                        console.log(editor.getHtml())
                        const content = JSON.stringify(editor.getProjectData());
                        const body = JSON.stringify({
                            name: "<?php echo e($name); ?>",
                            slug: "<?php echo e($slug); ?>",
                            store_id: "<?php echo e($store_id); ?>",
                            enable_page_header: "<?php echo e(strtolower($enable_page_header)); ?>",
                            enable_page_footer: "<?php echo e(strtolower($enable_page_footer)); ?>",
                            html: btoa(editor.getHtml()),
                            css: editor.getCss(),
                        });

                        await fetch(`/api/page-builder/<?php echo e($page_id); ?>`, {
                            method: "POST",
                            headers: {
                                'Accept': 'application/json, text/plain, */*',
                                'Content-Type': 'application/json',
                                'Authorization': `Bearer ${localStorage.getItem('token')}`
                            },
                            body
                        }).then(res => console.log('res', res, res.body));
                        alert("Page Saved!");
                    }
                },
                {
                    id: 'back-db',
                    className: 'fas fa-times',
                    command: 'back-db',
                    attributes: {
                        title: 'Back'
                    }
                }
            ]
        );
    </script>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/storelancer_new/resources/views/page-builder.blade.php ENDPATH**/ ?>