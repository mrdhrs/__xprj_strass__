<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>
<?php $this->assign('title', $title); ?>
<?php $this->assign('ctitle', $ctitle); ?>



<section class="content">
    <nav class="large-3 medium-4 columns" id="actions-sidebar" style="margin-bottom:15px;">
        <?= $this->Html->link('<i class="fa fa-plus-circle" aria-hidden="true"></i>   Ajouter un utilisateur', ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-sm btn-primary', 'title' => 'Ajouter un utilisateur']) ?>
    </nav>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><span class="small"><?= $this->Paginator->counter(['format' => __('Page {{page}} sur {{pages}}, {{current}} enregistrement(s) sur {{count}}')]) ?></span></h3>

              <div class="box-tools">
              	<form method="get">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <?php echo $this->Form->text('qs', ['class' => 'form-control pull-right', 'placeholder' => 'Recherche par id, nom, prénom, email ou rôle', 'value' => $_qs_]); ?>

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
                  	<th scope="col"><?= $this->Paginator->sort('id', '#id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom', 'Nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pnom', 'Prénom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username', 'Nom d\'utilisateur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th><?= $this->Paginator->sort('atype', 'Rôle') ?></th>
                    <th></th>
                </tr>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nom) ?></td>
                    <td><?= h($user->pnom) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->atype) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:18px"></i>', ['action' => 'edit', $user->id], ['escape' => false, 'title' => 'Editer']) ?>&nbsp;&nbsp;
                        <?= ($user->id != 1 ? $this->Form->postLink('<i class="fa fa-trash" aria-hidden="true" style="font-size:18px"></i>', ['action' => 'delete', $user->id], ['confirm' => __('Vous êtes sûr de vouloir supprimer l\'utilisateur # {0}?', $user->id), 'escape' => false, 'title' => 'Supprimer']) : '') ?>
                    </td>
                </tr>
                <?php endforeach; ?>
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
