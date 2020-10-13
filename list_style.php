<?php
/**
 * @package Joomla
 * @author ELLE
 * @website http://joomext.ru/
 * @email support@joomext.ru
 * @copyright Copyright by Joomext.ru. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 **/
// no direct access
defined('_JEXEC') or die();


class plgJshoppingProductsList_style extends JPlugin
{


    public function __construct(&$subject, $config = array())
    {
          
        parent::__construct($subject, $config);
        $lang = JFactory::getLanguage();
        $lang->load('plg_jshoppingproducts_list_style', JPATH_ADMINISTRATOR);

    }

    function onBeforeDisplayProductListView(&$view)
    {

        $jshopConfig = JSFactory::getConfig();
        $jinput = JFactory::getApplication()->input;
        $session = JFactory::getSession();

        $doc = JFactory::getDocument();
        $doc->addStyleSheet(JURI::root(true) . '/plugins/jshoppingproducts/list_style/assets/css/tmp_list.css');

        $list_style = $jinput->getCmd('list_style', '');

        if ($list_style == 'tmp_table') $session->set("list_style", 'tmp_table');
        if ($list_style == 'tmp_list') $session->set("list_style", 'tmp_list');
        $style = $session->get("list_style");

        if ($style == 'tmp_list')
        {
            $view->addTemplatePath(dirname(__FILE__) . '/tmpl');
            $view->setLayout('list');
            $class = 'active';
        } else
        {
            $class = 'noactive';
        }

        echo'<pre>';print_r( $view );echo'</pre>'.__FILE__.' '.__LINE__;
        die(__FILE__ .' '. __LINE__ );


        $view->list_style = '
                             <div class="list_style">
                                  <form id="form_list_style" class="' . $class . '" name="list_style" action="' . JURI::getInstance()->tostring() . '" method="post">
                                    <div style="float: left; height: 19px; font-size: 14px; line-height: 20px; padding: 0 10px; color: #0053b9; font-weight: 600;">' . JText::_('PLG_LIST_STYLE_VIEW') . ':</div>
									<div style="float: left; height: 19px;">
                                    <button type="submit" class="plit" title="Плиткой"  value="tmp_table" name="list_style"></button>
                                    <button type="submit" class="list" title="Списком" value="tmp_list" name="list_style"></button>
									</div>
                                  </form>
                            </div>';
        print  $view->list_style;
        $view->config->copyrightText .= '';

    }



}