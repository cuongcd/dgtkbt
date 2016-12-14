<?php namespace App\Blocks\Mvp;

use App\Blocks\BaseGrid;
use App\Helpers\User;
use URL;
use Lang;
use Auth;
use App\Models\User as UserModel;

class Grid extends BaseGrid
{
    public $is_permission;
    public function __construct($gridId, $resource, $collectionKey, $params = null, $toExport = false)
    {
        $this->setTitle("");
        $this->setGridUrl(URL::to('mvps/index'));
        $this->setAjaxGridUrl(URL::route('mvps.grid'));
        parent::__construct($gridId, $resource, $collectionKey, $params, $toExport);
    }

    protected function _addButtons()
    {
//        parent::_addButtons();

    }

    protected function _addGridButtons()
    {
        $this->_addGridButton('download', [
            'url' => URL::route('mvps.export', ['xlsx']),
            'label' => Lang::get('general.export_excel')
        ]);

//        parent::_addGridButtons();
    }

    /*
    * Add Massactions
    *
    * input array
    * return collection
    * */
    protected function _addMassactions()
    {

        $id = Auth::id();
        $user = UserModel::find($id);
        if($user->vaitro_id == config('vaitro.TruongBan') || $user->vaitro_id == config('vaitro.PhoTruongBan')){
            $this
                ->_addMassaction('delete', [
                    'label' => Lang::get('general.delete'),
                    'url' => URL::route('mvps.mass-delete'),
                    'confirm' => Lang::get('general.are_you_sure'),
                ]);
        }
        if($user->vaitro_id == config('vaitro.TruongPhong') || $user->vaitro_id  ==config('vaitro.PhoTruongPhong')) {
            $this
                ->_addMassaction('delete', [
                    'label' => Lang::get('general.delete'),
                    'url' => URL::route('mvps.mass-delete'),
                    'confirm' => Lang::get('general.are_you_sure'),
                ]);
        }
    }

    protected function _addColumns()
    {
        $this
            ->_addColumn('user_id', [
                'label' => 'Tên Nhân Viên',
                'filter' =>false,
                'type'  => 'select',
                'options' => User::getAllUser(),
                'sort' => false,
            ])
            ->_addColumn('nguoidexuat_id', [
                'label' => 'Người Đề Xuất',
                'filter' =>false,
                'type'  => 'select',
                'options' => User::getAllUser(),
                'sort' => false,
//                'edit' =>true,
            ])
            ->_addColumn('ghichu', [
                'label' => 'Thành Tích',
                'filter' =>false,
                'sort' => false,
            ])
            ->_addColumn('is_banduyet', [
                'label' => 'Ban Duyệt',
                'filter' =>false,
                'type' => 'select',
                'sort' => false,
                'options' => [
                    0 => 'Chưa duyệt',
                    1 => 'Đã duyệt'
                ]
            ]);

//            ->_addColumn('action', [
//                'label' => Lang::get('general.action'),
//                'type' => 'action',
//                'align' => 'center',
//                'links' => [
//                    [
//                        'route' => 'works.edit',
//                        'fields' => ['_id'],
//                        'getters' => ['_id'],
//                        'type' => 'edit',
//                        'label' => Lang::get('general.edit'),
//                        'options' => ['title' => Lang::get('general.edit')],
//                    ],
//                ],
//                'filter' => false,
//                'sort' => false,
//            ]);
    }

    public function getRowUrl($row)
    {
//        return URL::route('works.edit', $row->_id);
    }
}