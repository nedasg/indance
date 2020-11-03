<div class="forms-container" style="min-height: 90vh; justify-content: left;">
    <form class="login-form" method="POST">
        <?php foreach ($form['fields'] as $field_id => $field): ?>
            <!-- Form field -->
            <?php if (in_array($field['type'], ['text', 'password'])): ?>
                <!-- Simple input field: text, password -->
                <div class="input-field input-select <?php print $field['css_class']; ?>">
                    <input class="<?php print $field['css_class']; ?>" type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                </div>
            <?php elseif ($field['type'] == 'select'): ?>
                <!-- Select field -->
                <div class="input-field input-select <?php print $field['css_class']; ?>">
                    <select name="<?php print $field_id; ?>">
                        <option value="null" disabled <?php if (is_null($field['selected'])) { print 'selected'; }; ?>>...</option>
                        <?php foreach ($field['options'] as $option_id => $option_label): ?>
                            <option value="<?php print $option_label; ?>"><?php print $option_label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <!-- Errors -->
            <?php if (isset($field['error_msg'])): ?>
                <p class="error"><?php print $field['error_msg']; ?></p>
            <?php endif; ?>

        <?php endforeach; ?>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('select').not('.disabled').formSelect();
                });
            </script>

        <!-- Buttons -->
        <div class="input-field input-big buttons-container">
            <?php foreach ($form['buttons'] as $button_id => $button): ?>
                <button class="btn waves-effect waves-light" name="action" value="<?php print $button_id; ?>">
                    <?php print $button['text']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </form>
</div>