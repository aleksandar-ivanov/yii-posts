<?php
    use yii\helpers\Html;
?>

<div class="posts-default-index">
    <div class="row">
        <div class="col-md-8">
            <a class="btn btn-success" href="/posts/add"><i class="fa fa-plus"></i> Add new post</a>
        </div>
        <div class="col-md-8">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $provider,
                'columns' => [
                    [
                        'attribute' => 'title'
                    ],
                    [
                        'attribute' => 'description',
                    ],
                    [
                        'attribute' => 'created_by',
                        'format' => 'html',
                        'value' => function ($model, $key, $index, $column) {
                            $userId = $model->createdBy->id;
                            return Html::a($model->createdBy->getFullname(), "/users/view/?id=$userId");
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'contentOptions' => [
                            'class' => 'action-column'
                        ],
                        'header' => 'Actions',
                        'template' => '{edit} {delete}',
                        'buttons' => [
                            'edit' => function ($url, $model, $key) {
                                return "<a href='/posts/default/edit?id=$model->id' class='btn btn-primary'>
                                <i class='fa fa-pencil'></i>
                                </a>";
                            },
                            'delete' => function ($url, $model, $key) {
                                return "<a href='/posts/default/delete?id=$model->id' class='btn btn-primary'>
                                <i class='fa fa-trash'></i>
                                </a>";
                            },
                        ]
                    ]
                ]
            ]) ?>
        </div>
    </div>
</div>
