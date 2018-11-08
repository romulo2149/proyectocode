<?php

class recorridos extends CI_Model
{
    public function getrecorridodia($fecha, $chofer)
    {
        $fecha2 = date('Y-d-m',
        mktime(0, 0, 0,
            $fecha->format("m"),
            $fecha->format("d")+1,
            $fecha->format("Y")
            )
        ); 
        $f1 = $fecha->format('Y-d-m');
        $f2 = $fecha2;
        $this->load->database();
        $query = $this->db->query(
            "select x.Latitude, x.Longitude, y.DateTime_GPS from
            (select distinct
            Latitude, Longitude from bh_table_Transactions 
            where Instance_Id = '".$chofer."' 
            and DateTime_GPS > '".$f1." 00:00:00.000' 
            and DateTime_GPS < '".$f2." 00:00:00.000')x
            left outer join
            (select DateTime_GPS, Latitude, Longitude, row_number() over (partition by lower(Latitude) order by DateTime_GPS) as rn from bh_table_Transactions 
            where Instance_Id = '".$chofer."'
            and DateTime_GPS > '".$f1." 00:00:00.000' 
            and DateTime_GPS < '".$f2."  00:00:00.000')y
            on
            x.Latitude = y.Latitude
            and x.Longitude = y.Longitude and y.rn = 1
            order by y.DateTime_GPS"
        );
        return $query->result();
    }

    public function kmrecorrido($fecha, $chofer)
    {
        $fecha2 = date('Y-d-m',
        mktime(0, 0, 0,
            $fecha->format("m"),
            $fecha->format("d")+1,
            $fecha->format("Y")
            )
        ); 
        $f1 = $fecha->format('Y-d-m');
        $f2 = $fecha2;
        $this->load->database();
        $query = $this->db->query(
            "select  t2.Client_Id, t2.Instance_Id, t2.DateTime_GPS, t2.Latitude, t2.Longitude,t3.Latitude, t3.Longitude,
            [dbo].[dn_fn_CalculaDistancia]( t2.Latitude, t2.Longitude,t3.Latitude, t3.Longitude) as total 
            from bh_table_Transactions t2 inner join (
                select *, nRecord +1 as n from bh_table_Transactions where Instance_Id='".$chofer."') 
                t3 on t2.nRecord= t3.n 
                where t2.Instance_Id = '".$chofer."' and t2.DateTime_GPS > '".$f1." 00:00:00.000'
                and t2.DateTime_GPS < '".$f2." 00:00:00.000'
                order by t2.nRecord"
            );
        return $query->result();
    }
}