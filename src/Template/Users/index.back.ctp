<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<?php $this->assign('title', $title); ?>
<?php $this->assign('ctitle', $ctitle); ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pnom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pass') ?></th>
                <th scope="col"><?= $this->Paginator->sort('atype') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_creation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_modification') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->nom) ?></td>
                <td><?= h($user->pnom) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->pass) ?></td>
                <td><?= h($user->atype) ?></td>
                <td><?= h($user->date_creation) ?></td>
                <td><?= h($user->date_modification) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<section class="content">
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $this->Paginator->counter(['format' => __('Page {{page}} sur {{pages}}, {{current}} enregistrement(s) sur {{count}}')]) ?></h3>

              <div class="box-tools">
              	<form method="post">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Recherche...">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  	<th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nom') ?></th>
                    <th><?= $this->Paginator->sort('pnom') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('atype') ?></th>
                    <th></th>
                </tr>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nom) ?></td>
                    <td><?= h($user->pnom) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->atype) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:18px"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'title' => 'Editer']) ?>&nbsp;&nbsp;
                        <?= $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true" style="font-size:18px"></i>', ['action' => 'delete', $user->id], ['confirm' => __('Vous êtes sûr de vouloir supprimer l\'utilisateur # {0}?', $user->id), 'escape' => false, 'title' => 'Supprimer']) ?>
                    </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
				<?= $this->Paginator->prev('&laquo;', ['escape' => false]) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('&raquo;', ['escape' => false]) ?>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
</section>
