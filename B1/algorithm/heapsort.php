class Solution {
    // 題意より, 
    // 「最悪実行時間が, O(nlog(n))」「空間計算量(メモリ消費量)が最小」となるようなアルゴリズムとして,
    // ヒープソートを利用する. 言語はPHPを用いる.  
    // 感想として, 1. 疑似コードはスコープの概念が全然ないのでリアルコードでは注意と, 2. 0始まり/1始まりの差に注意することを意識しないとなと強く思った.  

    /**
     * @param Integer[] $this->nums
     * @return Integer[]
     */

    // インスタンス変数
    public $nums;
    public $len;

    function sortArray($nums) {
        $this->nums = $nums;
        $this->len = count($this->nums);
        $this->buildMaxHeapify();
        for($i = $this->len -1; $i > 0; $i--){
            list($this->nums[0], $this->nums[$i]) = array($this->nums[$i], $this->nums[0]);
            $this->maxHeapify(0);
        }
        return $this->nums;
    }

    protected function maxHeapify($i) {
            $il = ($this->len >= $i*2) ? $i*2 : null; // index of light-child
            $ir = ($this->len >= $i*2+1) ? $i*2+1 : null; // index of light-child
            if(($il != null)&&($this->nums[$il] > $this->nums[$i])){
                $imax = $il;  // index of max
            }else{
                $imax = $i;
            }
            if(($ir != null)&&($this->nums[$ir] > $this->nums[$il])){
                $imax = $ir;
            }

            if($i != $imax){
                list($this->nums[$i], $this->nums[$imax]) = array($this->nums[$imax], $this->nums[$i]);
                $this->maxHeapify($imax);
            }
    }

    protected function buildMaxHeapify(){
        for($i = floor($this->len/2)-1; $i > -1; $i--){
            $this->maxHeapify($i);
        }
        return $this->nums;
    }

}