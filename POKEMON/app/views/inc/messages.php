<?php if($system_messages != ''): ?>
    <div class="system_messages">
        <span>
            <?php echo $system_messages; ?>
        </span>
        <a name="close-message" id="close-message" class="close-message">&#10005;</a>
    </div>
<?php endif; ?>