<?php
namespace SupportTicket\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $name
 * @property string $description
 * @property int $status
 * @property int $priority
 * @property \Cake\I18n\Time $deadline
 * @property float $cost
 */
class Ticket extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    protected function _getStatusOptions()
    {
        return [1 => __('New'), 2 => __('Closed')];
    }

    protected function _getPriorityOptions()
    {
        return [1 => __('Low'), 2 => __('Medium'), 3 => __('Hight')];
    }

    protected function _getDeadlineBr()
    {
        $year = $this->deadline->year;
        $month = $this->deadline->month;
        $day = $this->deadline->day;

        return $day . '/' . $month . '/' . $year;
    }
}
