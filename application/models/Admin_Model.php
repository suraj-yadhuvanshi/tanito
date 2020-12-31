<?php
class Admin_Model extends CI_Model
{
	public function select($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);



		$q = $this->db->get();
		return $q->result();

	}
	public function selectcomments($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');    
		$this->db->from($tbl);
		$this->db->join('users', 'comments.user_id = users.id');
		$this->db->where($con);
		//$this->db->join('user', 'report.second_user_id = user.id');
		$query = $this->db->get();
		return $query->result();
	}
	public function delete($tbl,$con)
	{
		$this->db->where($con);
		$this->db->delete($tbl);
		return TRUE;
	}
	public function selectlogo($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->order_by('id', 'DESC');


		$q = $this->db->get();
		return $q->row();

	}
	public function selectimg($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->limit( 5);
					$this->db->order_by('videoid', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function selectvideocount($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
						//$this->db->select_max('counter');
					$this->db->limit( 6);
					$this->db->order_by('counter', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function seleclanguage($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->order_by('language_id', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function selectvideo($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->limit(6);
					$this->db->order_by('videoid', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function selectvideomustwatch($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->limit(4);
					$this->db->order_by('videoid', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function allvideos($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->order_by('videoid', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
	public function selectvideowatchagain($tbl,$con='',$con1='',$con2='',$con3='')
	{
	
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);
					$this->db->limit(4);
					$this->db->order_by('videoid', 'DESC');

		$q = $this->db->get();
		return $q->result();

	}
public function selectrow($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');
		$this->db->from($tbl);

		if ($con)
			$this->db->where($con);

			if ($con1)
				$this->db->where($con1);

				if ($con2)
					$this->db->where($con2);

					if ($con3)
						$this->db->where($con3);



		$q = $this->db->get();
		return $q->row();

	}
	function selectvideos($search){
        $this->db->select('*');
        $this->db->from('video');
        $this->db->like($search);
		//$this->db->like('title', $search, 'after');
        //$this->db->where($search);
        $query = $this->db->get();
        return $query->result();
    }
    function selectcat($search){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->like($search);
		//$this->db->like('title', $search, 'after');
        //$this->db->where($search);
        $query = $this->db->get();
        return $query->row();
    }
    function selectsubcat($search){
        $this->db->select('*');
        $this->db->from('sub_category');
        $this->db->like($search);
		//$this->db->like('title', $search, 'after');
        //$this->db->where($search);
        $query = $this->db->get();
        return $query->row();
    }
    function selectuser($search){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like($search);
		//$this->db->like('title', $search, 'after');
        //$this->db->where($search);
        $query = $this->db->get();
        return $query->row();
    }
	public function selectjoin($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');    
		$this->db->from($tbl);
		$this->db->join('category', 'video.category_id = category.category_id');
		$this->db->join('sub_category', 'video.subcategory_id = sub_category.subcategory_id');
		$this->db->join('language', 'video.lang_id = language.language_id');
		if ($con)
			$this->db->where($con);
		$query = $this->db->get();
		return $query->result();

	}
	public function selectjoinwatch($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');    
		$this->db->from($tbl);
		$this->db->join('video', 'playlist.video_id = video.videoid');
		$query = $this->db->get();
		return $query->result();

	}
	public function insert($tbl,$data)
	{
		$this->db->insert($tbl,$data);
		return $this->db->insert_id();

	}
	public function update($tbl,$data,$con='')
	{
		$this->db->where($con);
		$this->db->update($tbl,$data);
		return $this->db->affected_rows();
	}
}
?>