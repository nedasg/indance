<div class="forms-container">
    <?php foreach ($forms as $form_index => $form_data): ?>
        <form class="currentregs-form" method="POST" action="/login/editregs.php">
            <?php foreach ($form_data['fields'] as $field_id => $field): ?>

                    <!-- Form fields, skirta išskirtinai vien tik type['hidden'] -->
                    <?php if ($field['type'] == 'hidden'): ?>
                        <!-- Hidden field -->
                        <?php if (!is_array($field['value'])): ?>
                            <input 
                                type="<?php print $field['type']; ?>" 
                                name="<?php print $field_id; ?>" 
                                value="<?php print $field['value']; ?>" 
                                />
                            <?php else: ?>
                                <?php foreach ($field['value'] as $array_element): ?>
                                <input 
                                    type="<?php print $field['type']; ?>" 
                                    name="<?php print $field_id; ?>[]" 
                                    value="<?php print $array_element; ?>" 
                                    />
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                    <?php endif; ?>
                    <!-- Errors -->
                    <?php if (isset($field['error_msg'])): ?>
                        <p class="error"><?php print $field['error_msg']; ?></p>
                    <?php endif; ?>
                
            <p class="output-text <?php print $field['css_class']; ?>" style="width: 100%;"><?php print $field['text']; ?></p>
            <?php endforeach; ?>

            <input 
                type="<?php print $form_data['form_index']['type']; ?>" 
                name="<?php print $form_data['form_index']['name']; ?>" 
                value="<?php print $form_index; ?>" 
                />


            <!-- Buttons -->
            <div class="input-field input-big currentregs-buttons">
                <?php foreach ($form_data['buttons'] as $button_id => $button): ?>
                    <button class="btn waves-effect waves-light" name="action" type="submit" value="<?php print $button_id; ?>">
                        <?php print $button['text']; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>
    <?php endforeach; ?>
</div>