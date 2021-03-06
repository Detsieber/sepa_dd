<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.3                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2013                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2013
 * $Id$
 *
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Sepa_DAO_SEPATransactionGroup extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   * @static
   */
  static $_tableName = 'civicrm_sdd_txgroup';
  /**
   * static instance to hold the field values
   *
   * @var array
   * @static
   */
  static $_fields = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   * @static
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   * @static
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   * @static
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   * @static
   */
  static $_log = true;
  /**
   * ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * End-to-end reference for this tx group.
   *
   * @var string
   */
  public $reference;
  /**
   * FRST, RCUR or OOFF
   *
   * @var string
   */
  public $type;
  /**
   * Target collection date
   *
   * @var datetime
   */
  public $collection_date;
  /**
   * Latest submission date
   *
   * @var datetime
   */
  public $latest_submission_date;
  /**
   * When was this item created
   *
   * @var datetime
   */
  public $created_date;
  /**
   * fk sepa group Status options in civicrm_option_values
   *
   * @var int unsigned
   */
  public $status_id;
  /**
   * fk to SDD Creditor Id
   *
   * @var int unsigned
   */
  public $sdd_creditor_id;
  /**
   * fk to SDD File Id
   *
   * @var int unsigned
   */
  public $sdd_file_id;
  /**
   * class constructor
   *
   * @access public
   * @return civicrm_sdd_txgroup
   */
  function __construct()
  {
    $this->__table = 'civicrm_sdd_txgroup';
    parent::__construct();
  }
  /**
   * return foreign links
   *
   * @access public
   * @return array
   */
  function links()
  {
    if (!(self::$_links)) {
      self::$_links = array(
        'sdd_creditor_id' => 'civicrm_sdd_creditor:id',
        'sdd_file_id' => 'civicrm_sdd_file:id',
      );
    }
    return self::$_links;
  }
  /**
   * returns all the column names of this table
   *
   * @access public
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
          'export' => true,
          'where' => 'civicrm_sdd_txgroup.id',
          'headerPattern' => '',
          'dataPattern' => '',
        ) ,
        'reference' => array(
          'name' => 'reference',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Reference') ,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
        ) ,
        'type' => array(
          'name' => 'type',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Type') ,
          'maxlength' => 4,
          'size' => CRM_Utils_Type::FOUR,
        ) ,
        'collection_date' => array(
          'name' => 'collection_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Collection Date') ,
        ) ,
        'latest_submission_date' => array(
          'name' => 'latest_submission_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Latest Submission Date') ,
        ) ,
        'created_date' => array(
          'name' => 'created_date',
          'type' => CRM_Utils_Type::T_DATE + CRM_Utils_Type::T_TIME,
          'title' => ts('Created Date') ,
        ) ,
        'status_id' => array(
          'name' => 'status_id',
          'type' => CRM_Utils_Type::T_INT,
          'required' => true,
        ) ,
        'sdd_creditor_id' => array(
          'name' => 'sdd_creditor_id',
          'type' => CRM_Utils_Type::T_INT,
          'FKClassName' => 'CRM_Sepa_DAO_SEPACreditor',
        ) ,
        'sdd_file_id' => array(
          'name' => 'sdd_file_id',
          'type' => CRM_Utils_Type::T_INT,
          'FKClassName' => 'CRM_Sepa_DAO_SEPASddFile',
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * returns the names of this table
   *
   * @access public
   * @static
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * returns if this table needs to be logged
   *
   * @access public
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * returns the list of fields that can be imported
   *
   * @access public
   * return array
   * @static
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['sdd_txgroup'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * returns the list of fields that can be exported
   *
   * @access public
   * return array
   * @static
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['sdd_txgroup'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
