<?php
/**
 *  给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出 和为目标值 target  的那 两个 整数，并返回它们的数组下标。
 *  你可以假设每种输入只会对应一个答案。但是，数组中同一个元素在答案里不能重复出现。
 *  你可以按任意顺序返回答案。
 *  示例 1：
 *  输入：nums = [2,7,11,15], target = 9
 *  输出：[0,1]
 *  解释：因为 nums[0] + nums[1] == 9 ，返回 [0, 1] 。
 *  示例 2：
 *  输入：nums = [3,2,4], target = 6
 *  输出：[1,2]
 *  示例 3：
 *  输入：nums = [3,3], target = 6
 *  输出：[0,1]
 */			
class Solution {
	/**
	 * 返回连续指之和等于target的键值
	 *
	 * @param array $nums
	 * @param int $target
	 */
	public function twoContinuitySum(array $nums, int $target) {
		$targetArray = [];
		foreach($nums as $key => $num) {
			if($key+1 < count($nums) && $num+$nums[$key+1] == $target) {
				$targetArray[] = [$key, $key+1];
			}	
		}
		return $targetArray;
	}

	/**
	 * 返回任意两数之和等于目标值的键值，且要求时间复杂度小于O(n2)
	 *
	 * @author Shanla
	 * @param array $sums
	 * @param int $target
	 */
	public function twoSum(array $nums, int $target)
	{
		$targetArray = $reduceArray = $keyArray = [];
		foreach($nums as $key => $num) {
			$reduceArray[$key] = $target - $num;
			$keyArray[$num][] = $key;
		}

		foreach($reduceArray as $key => $num) {
			if(isset($keyArray[$num]) && !empty($keyArray[$num])) {
				foreach($keyArray[$num] as $keyArr) {
					$temp = [$key, $keyArr];
					sort($temp);
		            if (!in_array($temp, $targetArray)) {
						$targetArray[] = $temp;
                    }
				}
			}
		}
		return $targetArray;
	}
}

$object = new Solution();
$result = $object->twoSum([2,7,2,7,11,15], 9);
print_r($result);
