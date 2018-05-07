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
                    ],
                ]
            ]) ?>
        </div>
    </div>
</div>
