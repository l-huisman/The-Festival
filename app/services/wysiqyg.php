<?php

namespace Services;

class Wysiqyg
{

    /**
     * Renders the specified data into a text area.
     *
     * @param string $data The data to be rendered.
     * @param string $text_area_name The name of the text area element.
     * @param string $action The action to be performed.
     * @return void
     * 
     * @example
     * ```php
     * $wysiqyg = new Services\Wysiqyg();
     * $wysiqyg->render("Your Text Here", "Post variable name", "/your-action-url");
     * ```
     */
    function render(string $data = "", string $text_area_name = "default", string $action = "")
    {

?>
        <!DOCTYPE html>
        <script src="https://cdn.tiny.cloud/1/30x8vgbwun6m4b3yb3zv85ytuawvcv2e0k80mubg7vx7vx72/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
                plugins: 'code table lists',
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        </script>
        <form method="post" action="<?= $action ?>">
            <textarea name="<?= $text_area_name ?>" id="myeditorinstance"><?= htmlspecialchars($data) ?></textarea>
            <button type="submit">Submit</button>
        </form>
<?php
    }
}
