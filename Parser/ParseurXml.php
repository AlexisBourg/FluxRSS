<?php


class ParseurXml
{

    public function __construct()
    {
        global $fluxEmpty;
        $mdlF = new ModelFlux();
        $new = new ModelNews();

        $new->dropNews();
        if ($mdlF->isEmpty()){
            $fluxEmpty=true;
        }
        else {
            $flux = $mdlF->getAllFlux();

            foreach ($flux as $f) {
                $rss_load = simplexml_load_file($f->getUrl());
                foreach ($rss_load->channel->item as $item) {
                    $title = (string)$item->title;
                    $description = $item->description;
                    $date = $item->pubDate;
                    $date = substr($date, 4, -14);
                    $d = substr($date, 0, -10);
                    $mm = substr($date, 4, -6);
                    switch ($mm) {
                        case "Jan":
                            $mmm = "01";
                            break;
                        case "Feb":
                            $mmm = "02";
                            break;
                        case "Mar":
                            $mmm = "03";
                            break;
                        case "Apr":
                            $mmm = "04";
                            break;
                        case "May":
                            $mmm = "05";
                            break;
                        case "Jun":
                            $mmm = "06";
                            break;
                        case "Jul":
                            $mmm = "07";
                            break;
                        case "Aug":
                            $mmm = "08";
                            break;
                        case "Sep":
                            $mmm = "09";
                            break;
                        case "Oct":
                            $mmm = "10";
                            break;
                        case "Nov":
                            $mmm = "11";
                            break;
                        case "Dec":
                            $mmm = "12";
                            break;
                        default :
                            $mmm =date("m");
                    }
                    $yyyy = substr($date, 8);
                    (string)$date = $yyyy . $mmm . $d;
                    $ddate = str_replace(' ', '-', $date);
                    $ddate = substr($ddate, 1, -1);

                    $url = $item->link;
                    $new->addNews(new News($title, $description, $ddate, $url));
                };
            }
        }
    }
}