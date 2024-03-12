tinymce.init({
  selector: '#myeditorinstance',
  height: 500,  // Change the height of the editor
  menubar: true,  // Enable the menubar
  plugins: [  // Enable plugins
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',  // Customize the toolbar
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'  // Set content style
});