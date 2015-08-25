<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List User Record'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="userRecord form large-10 medium-9 columns">
    <?= $this->Form->create($userRecord) ?>
    <fieldset>
        <legend><?= __('Add User Record') ?></legend>
        <?php
            echo $this->Form->input('contact');
            echo $this->Form->input('username');
            echo $this->Form->input('usersubname');
            echo $this->Form->input('tel');
            echo $this->Form->input('mailaddress');
            echo $this->Form->input('address');
            echo $this->Form->input('hope_question');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
