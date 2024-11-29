<?php
namespace App\Controllers\Admin;


use App\Entities\Admin\Contact;

class Contacts extends \App\Controllers\GoBaseController {

    use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\ContactModel';

    protected static $singularObjectNameCc = 'contact';
    protected static $singularObjectName = 'Contact';
    protected static $pluralObjectName = 'Contacts';
    protected static $pluralObjectNameCc = 'contacts';
    protected static $controllerSlug = 'contacts';

    protected static $viewPath = 'admin/contactViews/';

    protected $indexRoute = 'contactList';



    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('Contacts.moduleTitle');
        parent::initController($request, $response, $logger);

    }

    public function index() {
        if ( !logged_in() ) {
            return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
        }
        if ( !in_groups('admin') ) {
            return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
        }
        $this->viewData['usingClientSideDataTable'] = true;

        $this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('Contacts.contact')]);
        return parent::index();
    }

    public function add() {

        if ( !logged_in() ) {
            return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
        }
        if ( !in_groups('admin') ) {
            return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
        }

        $requestMethod = strtolower($this->request->getMethod());

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
            $sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :


                if ($this->canValidate()) :
                    try {
                        $successfulResult = $this->model->skipValidation(true)->save($sanitizedData);
                    } catch (\CodeIgniter\Database\Exceptions\DatabaseException $dex) {
                        $noException = false;
                        $this->dealWithException($dex);
                    } catch (\Exception $e) {
                        $noException = false;
                        $this->dealWithException($e);
                    }
                else:
                    $this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('Contacts.contact'))]);
                    $this->session->setFlashdata('formErrors', $this->model->errors());
                endif;

                $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            endif;
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('Contacts.contact'))]).'.';
                $message .= anchor(route_to('editContact', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('successMessage', $message);
                    else:
                        return $this->redirect2listView('successMessage', $message);
                    endif;
                else:
                    $this->viewData['successMessage'] = $message;
                endif;

            endif; // $noException && $successfulResult

        endif; // ($requestMethod === 'post')

        $this->viewData['contact'] = isset($sanitizedData) ? new Contact($sanitizedData) : new Contact();

        $this->viewData['formAction'] = route_to('createContact');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('Contacts.contact').' '.lang('Basic.global.addNewSuffix');


        return $this->displayForm(__METHOD__);
    } // end function add()

    public function edit($requestedId = null) {
        if ( !logged_in() ) {
            return redirect()->to('login')->with('warningMessage', lang('Auth.notLoggedIn'));
        }
        if ( !in_groups('admin') ) {
            return redirect()->back()->with('errorMessage', lang('Auth.notEnoughPrivilege'));
        }
        if ($requestedId == null) :
            return $this->redirect2listView();
        endif;
        $id = filter_var($requestedId, FILTER_SANITIZE_URL);
        $contact = $this->model->find($id);

        if ($contact == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('Contacts.contact')), $id]);
            return $this->redirect2listView('errorMessage', $message);
        endif;

        $requestMethod = strtolower($this->request->getMethod());

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
            $sanitizedData = $this->sanitized($postData, $nullIfEmpty);



            $noException = true;
            if ($successfulResult = $this->canValidate()) : // if ($successfulResult = $this->validate($this->formValidationRules) ) :



                if ($this->canValidate()) :
                    try {
                        $successfulResult = $this->model->skipValidation(true)->update($id, $sanitizedData);
                    } catch (\CodeIgniter\Database\Exceptions\DatabaseException $dex) {
                        $noException = false;
                        $this->dealWithException($dex);
                    } catch (\Exception $e) {
                        $noException = false;
                        $this->dealWithException($e);
                    }
                else:
                    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('Contacts.contact'))]);
                    $this->session->setFlashdata('formErrors', $this->model->errors());

                endif;

                $contact->fill($sanitizedData);

                $thenRedirect = true;
            endif;
            if ($noException && $successfulResult) :
                $id = $contact->id_user ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('Contacts.contact'))]).'.';
                $message .= anchor(route_to('editContact', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('successMessage', $message);
                    else:
                        return $this->redirect2listView('successMessage', $message);
                    endif;
                else:
                    $this->viewData['successMessage'] = $message;
                endif;

            endif; // $noException && $successfulResult
        endif; // ($requestMethod === 'post')

        $this->viewData['contact'] = $contact;

        $this->viewData['formAction'] = route_to('updateContact', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('Contacts.contact').' '.lang('Basic.global.edit3');


        return $this->displayForm(__METHOD__, $id);
    } // end function edit(...)



    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id_user';
            $menu = $this->model->getAllForMenu($reqVal.', full_name', 'full_name', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id_user = '';
            $nonItem->full_name = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
            'menu' => $menu,
            $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }

    public function menuItems() {
        if ($this->request->isAJAX()) {
            $searchStr = goSanitize($this->request->getPost('searchTerm'))[0];
            $reqId = goSanitize($this->request->getPost('id'))[0];
            $reqText = goSanitize($this->request->getPost('text'))[0];
            $onlyActiveOnes = false;
            $columns2select = [$reqId ?? 'id_user', $reqText ?? 'full_name'];
            $onlyActiveOnes = false;
            $menu = $this->model->getSelect2MenuItems($columns2select, $columns2select[1], $onlyActiveOnes, $searchStr);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->text = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
            'menu' => $menu,
            $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }

}
