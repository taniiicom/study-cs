class Solution {
    // 「最悪実行時間が, O(nlog(n))」「空間計算量(メモリ消費量)が最小」となるようなアルゴリズムとして,
    // ヒープソートを利用する. 言語はPHPを用いる.  

    /**
     * @param Integer[] $this->nums
     * @return Integer[]
     */

    // インスタンス変数
    public $nums;
    public $len;
    public $heapsize;

    function sortArray($nums) {
        $this->nums = $nums;
        $this->len = count($this->nums);
        $this->heapsize = $this->len;
        $this->buildMaxHeapify();
        for($i = $this->len -1; $i > 0; $i--){
            list($this->nums[0], $this->nums[$i]) = array($this->nums[$i], $this->nums[0]);
            $this->heapsize -= 1;
            $this->maxHeapify(0);
        }
        return $this->nums;
    }

    protected function maxHeapify($i) {
            $il = ($this->len > $i*2+1) ? $i*2+1 : null; // index of light-child
            $ir = ($this->len > $i*2+2) ? $i*2+2 : null; // index of light-child
            if(($il != null)&&($il < $this->heapsize)&&($this->nums[$il] > $this->nums[$i])){
                $imax = $il;  // index of max
            }else{
                $imax = $i;
            }
            if(($ir != null)&&($ir < $this->heapsize)&&($this->nums[$ir] > $this->nums[$imax])){
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
