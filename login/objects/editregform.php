<div class="forms-container">
        <?php if (!empty($reg_form_to_edit['errors'])): ?>
        <ul class="klaida">
            <?php foreach ($reg_form_to_edit['errors'] as $form_error): ?>
                <li><?php print $form_error; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form class="editregs-form" method="POST">
            <?php foreach ($reg_form_to_edit['fields'] as $field_id => $field): ?>
                <!-- Form fields -->    
                <?php if ($field['type'] == 'select'): ?>
                    <!-- Select field -->
                        <div class="input-field input-select <?php print $field['css_class']; ?>">
                            <select name="<?php print $field_id; ?>" <?php print $field['required'] ? 'required' : false; ?>>
                                <option value="null" disabled <?php if (is_null($field['selected'])) { print 'selected'; }; ?>>...</option>
                                <?php foreach ($field['options'] as $option_value): ?>
                                    <option value="<?php print $option_value; ?>" <?php choose_selected($field, $option_value) ? print 'selected' : false; ?>><?php print $option_value; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label class="<?php print $field['error_msg'] ?? false; ?>"><?php print $field['label']; ?></label>
                        </div>
                    <?php elseif ($field['type'] == 'checkbox'): ?>
                        <!-- Checkbox field -->
                        <div class="input-field input-big checkbox-cont">
                            <p class="outside-label <?php print $field['error_msg'] ?? false; ?>"><?php print $field['label']; ?></p>
                            <?php foreach ($field['name'] as $name_id => $name): ?>
                                <p class="input-checkbox">
                                    <label for="<?php print $name; ?>">
                                        <input id="<?php print $name; ?>" type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>[]" value="<?php print $name; ?>" <?php if (isset($field['current_choice']) && !empty($safe_input[$field_id]) && in_array($name, $safe_input[$field_id])) { print 'checked="' . $name . '"'; } else { if (count($field['name']) == 1) { print 'checked'; } }; ?>/>
                                        <span class="<?php if (count($field['name']) > 1) { print 'checkbox-rearranged'; }; ?>"><?php print $name_id + 1; ?></span>
                                    </label>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif ($field['type'] == 'radio'): ?>
                        <!-- Radio field -->
                        <?php if (count($field['value']) == 1): ?>
                        <div class="input-field input-small">
                        <?php else: ?>
                            <div class="input-field input-big">
                                <p class="outside-label <?php print $field['error_msg'] ?? false; ?>"><?php print $field['label']; ?></p>
                            <?php endif; ?>
                            <?php foreach ($field['value'] as $value_id => $value): ?>
                                <p>
                                    <label for="<?php print $value; ?>">
                                        <input id="<?php print $value; ?>" type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" value="<?php print $value; ?>" <?php print $field['required'] ? 'required' : false; ?> <?php if (isset($field['current_choice']) && $field['current_choice'] == $value) { print 'checked="' . $field['current_choice'] . '"'; } else { if (count($field['value']) == 1) { print 'checked'; } }; ?>/>
                                        <span class="<?php if (count($field['value']) > 1) { print 'radio-rearranged'; }; ?>"><?php print $value; ?></span>
                                    </label>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif (in_array($field['type'], ['text', 'password'])): ?>
                        <!-- Simple input field: text, password -->
                        <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                    <?php elseif ($field['type'] == 'hidden'): ?>
                        <!-- Hidden field -->
                        <div class="input-field input-big">
                            <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" value="<?php print $field['value']; ?>"/>
                        </div>
                    <?php elseif ($field['type'] == 'date'): ?>
                        <!-- Date field -->
                        <input type="<?php print $field['type']; ?>" min="<?php print $field['min']; ?>" max="<?php print $field['max']; ?>" name="<?php print $field_id; ?>"/>
                    <?php endif; ?>
                <?php endforeach; ?>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('select').not('.disabled').formSelect();
                        });
                    </script>

                    <input 
                        type="<?php print $reg_form_to_edit['form_index']['type']; ?>" 
                        name="<?php print $reg_form_to_edit['form_index']['name']; ?>" 
                        value="<?php print $reg_form_to_edit['form_index']['value']; ?>"
                    />
                
                <!-- Buttons -->
                <div class="input-field input-big buttons-container">
                    <!--<div class="more btn waves-effect waves-light">Daugiau pasirinkimų!</div>-->
                    <a class="btn waves-effect waves-light" href="editregs.php">RESET</a>
                <?php foreach ($reg_form_to_edit['buttons'] as $button_id => $button): ?>
                    <button class="btn waves-effect waves-light" type="<?php print $button_id; ?>" name="action" value="<?php print $button_id; ?>">
                        <?php print $button['text']; ?>
                        <i class="material-icons right"></i>
                    </button>
                <?php endforeach; ?>
                </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.more').click(function() {
                                $('.display-none').toggleClass('display-true');
                                });
                        });
                    </script>
        </form>
</div>