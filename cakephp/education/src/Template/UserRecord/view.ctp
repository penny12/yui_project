<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User Record'), ['action' => 'edit', $userRecord->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Record'), ['action' => 'delete', $userRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRecord->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Record'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Record'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userRecord view large-10 medium-9 columns">
    <h2><?= h($userRecord->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Contact') ?></h6>
            <p><?= h($userRecord->contact) ?></p>
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($userRecord->username) ?></p>
            <h6 class="subheader"><?= __('Usersubname') ?></h6>
            <p><?= h($userRecord->usersubname) ?></p>
            <h6 class="subheader"><?= __('Mailaddress') ?></h6>
            <p><?= h($userRecord->mailaddress) ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <p><?= h($userRecord->address) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($userRecord->id) ?></p>
            <h6 class="subheader"><?= __('Tel') ?></h6>
            <p><?= $this->Number->format($userRecord->tel) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($userRecord->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($userRecord->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Hope Question') ?></h6>
            <?= $this->Text->autoParagraph(h($userRecord->hope_question)) ?>
        </div>
    </div>
</div>
