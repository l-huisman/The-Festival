document.addEventListener("DOMContentLoaded", function () {
  tinymce.init({
    selector: 'textarea#default-editor',
    plugins: 'image',
  toolbar: 'image',
  
  });
});

console.log('wysiwyg/init.js');