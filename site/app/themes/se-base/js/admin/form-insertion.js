(function() {
    tinymce.PluginManager.add('custom_elements_mce_button', function(editor, url) {
        editor.addButton('custom_elements_mce_button', {
            icon: false,
            text: "Custom Elements",
            onclick: function() {
                editor.windowManager.open({
                    title: "Insert Custom Element",
                    body: [{
                        type   : 'listbox',
                        name   : 'form_insert',
                        label  : 'Custom Element Insertion',
                        values : [
                            { text: 'Example Name', value: 'example_shortcode' }
                        ],
                        value : 'test2' // Sets the default
                    }],
                    onsubmit: function(e) {
                        editor.insertContent(
                            '[custom_element type="' +
                            e.data.form_insert + 
                            '"]'
                        );
                    }
                });
            }
        });
    });
})();