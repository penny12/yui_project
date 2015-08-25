<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User Record'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="userRecord index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('contact') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('usersubname') ?></th>
            <th><?= $this->Paginator->sort('tel') ?></th>
            <th><?= $this->Paginator->sort('mailaddress') ?></th>
            <th><?= $this->Paginator->sort('address') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($userRecord as $userRecord): ?>
        <tr>
            <td><?= $this->Number->format($userRecord->id) ?></td>
            <td><?= h($userRecord->contact) ?></td>
            <td><?= h($userRecord->username) ?></td>
            <td><?= h($userRecord->usersubname) ?></td>
            <td><?= $this->Number->format($userRecord->tel) ?></td>
            <td><?= h($userRecord->mailaddress) ?></td>
            <td><?= h($userRecord->address) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $userRecord->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userRecord->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userRecord->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRecord->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
