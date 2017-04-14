<?php

class front_message extends CI_Controller
{
    public function all_line()
    {
        $message['spType']     = $this->input->get('spType');
        $message['lineType']   = $this->input->get('lineType');
        $message['page']       = $this->input->get('page');
        $message['pageSize']   = $this->input->get('pageSize');
        $message['city']       = $this->input->get('city');
        $message['actionType'] = $this->input->get('actionType');

        echo '<pre / >';
        var_dump($message);

        $this->db->select('sp.sp_id, member.mid, member.headimgurl, sp.name, sp.pic2, sp.pic1, sp.tj, sp.price, sp.line_type, sp.city, sp.bq');
        $this->db->from('sp');
        $this->db->join('member', 'member.mid = sp.price');
        $this->db->where('sp.sy', 1);
        $this->db->where('sp.sp_del', 1);
        $this->db->where('sp.sp_type', $message['spType']);
        $this->db->where('sp.line_type', $message['lineType']);
        $this->db->where('sp.city', $message['city']);
        $this->db->where('sp.tj', $message['actionType']);
        $this->db->limit($message['page'], $message['pageSize']);


        $result = $this->db->get()->result_array();
        echo "<br />";
        echo $this->db->last_query();
        echo "<br />";

        var_dump($result);
        // $this->load->library('form_validation');

        // if ($this->form_validation->run() == FALSE){
        //     $this->load->view('myform');
        // } else {
        //     $this->load->view('formsuccess');
        // }
//
//        SELECT sp.sp_id as id ,p.mid as mid,p.headimgurl,sp.name
//		as title,sp.pic2 as
//		imgUrl,sp.pic1 as
//		fullImgUrl,sp.tj as description,sp.price as lineprice,sp.line_type as lineType,sp.city

//		FROM `pan_sp`
//		sp,pan_member p where p.mid=sp.mid and sp.sy=1 and
//    sp.sp_del=1  and sp.sp_type=#{spType}
//		<if test="lineType!=null">
//		 and sp.line_type=#{lineType}
//		</if>
//		<if test="city!=null">
//		 and sp.city=#{city}
//		</if>
//		<if test="actionType!=null">
//		 and sp.action_type=#{actionType}
//		</if>
//		 order by sp.sort
//        @RequestMapping("all")
//	@ResponseBody
//	public AjaxResult getAllLinelist(@RequestParam(value = "spType", defaultValue = "1") Integer spType,@RequestParam(value = "lineType",required=false)Integer lineType,
//			@RequestParam(value = "page", defaultValue = "1") Integer page,
//			@RequestParam(value = "pageSize", defaultValue = "10") Integer pageSize,
//			@RequestParam(required=false) String city,
//			@RequestParam(required=false) String actionType) {
//
//        Map<String, Object> params = new HashMap<String, Object>();
//		params.put("spType", spType);
//		params.put("lineType", lineType);
//		params.put("city", city);
//		params.put("actionType", actionType);
//		PageBounds pageBounds = new PageBounds(page, pageSize);
//		PageList<LineListModel> lsLine = new PageList<LineListModel>();
//		try {
//            lsLine = panSpService.selectLineModelListAll(params, pageBounds);
//            if (lsLine == null || lsLine.isEmpty() || lsLine.size() < 0) {
//                return new AjaxResult(ExceptionCode.NOMOREDATA);
//
//            }
//        } catch (Exception e) {
//
//            logger.info(e.getMessage());
//            e.printStackTrace();
//            return new AjaxResult(ExceptionCode.FAIL, e.getMessage());
//
//        }
//		return new AjaxResult(ExceptionCode.SUCCESSFUL, lsLine);
//	}
    }

}