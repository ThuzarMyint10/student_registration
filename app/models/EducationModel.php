<?php
class EducationModel {
    // Access Modifier = public, private, protected
    private $id;
    private $semester_id;
    private $subject_id;
    private $achedamic_year_id;
   
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setSemesterId($semester_id)
    {
        $this->semester_id = $semester_id;
    }
    public function getSemesterId()
    {
        return $this->semester_id;
    }

    public function setSubjectId($subject_id)
    {
        $this->subject_id = $subject_id;
    }
    public function getSubjectId()
    {
        return $this->subject_id;
    }

    public function setAchedamicYearId($achedamic_year_id)
    {
        $this->achedamic_year_id = $achedamic_year_id;
    }
    public function getAchedamicYearId()
    {
        return $this->achedamic_year_id;
    }

    public function toArray() {
        return [
            "id" => $this->getId(),
            "semester_id" => $this->getSemesterId(),
            "subject_id" => $this->getSubjectId(),
            "achedamic_year_id" => $this->getAchedamicYearId()
        ];
    }
}
?>