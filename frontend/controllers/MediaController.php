<?php
class MediaController extends Controller
{

    public function actionIndex()
    {

        $model = new UploadForm();

        //Set the path that the file will be uploaded to
        $path = Yii::getAlias('@frontend') .'/web/upload/'

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs($path . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->renderPartial('index', ['model' => $model]);

    }
}
?>