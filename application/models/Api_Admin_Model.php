<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Api_Admin_Model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

    public function selectlike($tbl,$con='',$con1='',$con2='',$con3='')
	{
		$this->db->select('*');    
		$this->db->from($tbl);
		$this->db->join('users', 'vlike.user_id = users.id');
		$this->db->where($con);
		//$this->db->join('user', 'report.second_user_id = user.id');
		$query = $this->db->get();
		return $query->result();
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

					$this->db->limit( 12);

					$this->db->order_by('counter', 'DESC');



		$q = $this->db->get();

		return $q->result();



	}

	public function selectvideocountall($tbl,$con='',$con1='',$con2='',$con3='')

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

					$this->db->limit(12);

					$this->db->order_by('videoid', 'DESC');



		$q = $this->db->get();

		return $q->result();



	}
	public function selectvideoall($tbl,$con='',$con1='',$con2='',$con3='')

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

	public function selectvideomustwatchall($tbl,$con='',$con1='',$con2='',$con3='')

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

	public function selectvideowatchagainall($tbl,$con='',$con1='',$con2='',$con3='')

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

	public function selectjoin($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->join('category', 'video.category_id = category.category_id');

		$this->db->join('sub_category', 'video.subcategory_id = sub_category.subcategory_id');

		$this->db->join('language', 'video.lang_id = language.language_id');
		
		$query = $this->db->get();

		return $query->result();
	}

	public function selectjoinimg($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->join('category', 'video.category_id = category.category_id');

		$this->db->join('sub_category', 'video.subcategory_id = sub_category.subcategory_id');

		$this->db->join('language', 'video.lang_id = language.language_id');
		$this->db->limit( 5);

		$this->db->order_by('videoid', 'DESC');
		$query = $this->db->get();

		return $query->result();
	}

	public function selectjoincat($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->join('category', 'sub_category.category_id = category.category_id');

		$query = $this->db->get();

		return $query->result();
	}

	public function videojoin($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->join('video', 'playlist.video_id = video.videoid');
		$this->db->where($con);
		$query = $this->db->get();

		return $query->result();
	}
	public function videosavejoin($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->join('video', 'savevideo.video_id = video.videoid');
		$this->db->where($con);
		$query = $this->db->get();

		return $query->result();
	}
	public function videochanel($tbl,$con='',$con1='',$con2='',$con3='')
	{

		$this->db->select('*');    

		$this->db->from($tbl);

		$this->db->where($con);
		$this->db->join('users', 'video.admin_id = users.id');
		$query = $this->db->get();

		return $query->row();
	}
public function delete($tbl,$con)
	{
		$this->db->where($con);
		$this->db->delete($tbl);
		return TRUE;
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