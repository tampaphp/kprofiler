<?php
/**
 * Class KProfiler
 * Used to display SQL Commands run
 *
 * Example usage
 *
 * Add this to your config file
 * 'import' => array(
 *    'ext.tampaphp.*'
 * )
 *
 * Add this code after any Database calls, ORM, Query Builder, or raw SQL
 *
 * $this->widget('KProfiler', array('showStats'=>true)
 *
 * @author Kevin Petsche
 * @email kevin@tampaphp.com
 */
class KProfiler extends CWidget
{
	public $showStats = true;

	/**
	 * @todo only allow category 'system.db.ar.CActiveRecord'
	 */
	public function run($showStats = true)
	{ //Yii::beginProfile(234); Yii::endProfile(234);
		$logger = Yii::getLogger();
		// Display SQL queries neatly
		echo '<pre>';
		print_r($logger->getProfilingResults());
		echo '</pre>';

		// Display the query statistics
		if ($showStats) {
			$sqlStats = Yii::app()->db->getStats();
			echo 'Total Queries Run: ' . $sqlStats[0] . '<br>';
			echo 'Total Time: ' . $sqlStats[1] . '<br>';
		}
		Yii::app()->end();
	}
}