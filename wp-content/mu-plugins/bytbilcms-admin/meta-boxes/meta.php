<div class="my_meta_control">
    <label>Name</label>

    <p>
        <input type="text" name="_my_meta[name]" value="<?php if (!empty($meta['name'])) echo $meta['name']; ?>"/>
        <span>Enter in a name</span>
    </p>
    <label>Description <span>(optional)</span></label>

    <p>
        <textarea name="_my_meta[description]"
                  rows="3"><?php if (!empty($meta['description'])) echo $meta['description']; ?></textarea>
        <span>Enter in a description</span>
    </p>
</div>