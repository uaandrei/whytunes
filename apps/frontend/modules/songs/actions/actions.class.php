<?php

/**
 * songs actions.
 *
 * @package    newproject
 * @subpackage songs
 * @author     Andrei
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class songsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->songss = Doctrine_Core::getTable('Songs')
      ->createQuery('a')	
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->songs = Doctrine_Core::getTable('Songs')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->songs);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SongsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SongsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($songs = Doctrine_Core::getTable('Songs')->find(array($request->getParameter('id'))), sprintf('Object songs does not exist (%s).', $request->getParameter('id')));
    $this->form = new SongsForm($songs);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($songs = Doctrine_Core::getTable('Songs')->find(array($request->getParameter('id'))), sprintf('Object songs does not exist (%s).', $request->getParameter('id')));
    $this->form = new SongsForm($songs);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($songs = Doctrine_Core::getTable('Songs')->find(array($request->getParameter('id'))), sprintf('Object songs does not exist (%s).', $request->getParameter('id')));
    $songs->delete();

    $this->redirect('songs/index');
  }
 
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $songs = $form->save();

      $this->redirect('songs/edit?id='.$songs->getId());
    }
  }
}
