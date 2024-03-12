<script src="https://cdn.tiny.cloud/1/30x8vgbwun6m4b3yb3zv85ytuawvcv2e0k80mubg7vx7vx72/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="init.js"></script>
<form method="post" action="<?= $action ?>" class="form-group container">
    <textarea name="editor" id="default-editor" class="form-control"><?php if (isset($data)) {
        echo htmlspecialchars($data);
    } ?></textarea>
    <input type="hidden" name="id" value="<?= $id ?>"> <!-- Add this line to include the ID -->
    
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <button type="submit" class="btn btn-danger mt-3" formaction="/custom/delete">Delete</button>
</form>