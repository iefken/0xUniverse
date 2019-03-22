<?php
/**
 * Created by PhpStorm.
 * User: ief.falot
 * Date: 22-Oct-18
 * Time: 16:09 PM
 */

class Planet
{
    public $idPlanet;
    public $addressDiscoverer;
    public $idResource1;
    public $idResource2;
    public $idResource3;
    public $amountResource1;
    public $amountResource2;
    public $amountResource3;
    public $people;
    public $rarity;
    public $sectorX;
    public $sectorY;
    public $name;
    public $creationTX;
    public $discInBlock;

    /**
     * Planet constructor.
     * @param $idPlanet
     * @param $addressDiscoverer
     * @param $idResource1
     * @param $idResource2
     * @param $idResource3
     * @param $amountResource1
     * @param $amountResource2
     * @param $amountResource3
     * @param $people
     * @param $rarity
     * @param $sectorX
     * @param $sectorY
     * @param $name
     * @param $creationTX
     * @param $discInBlock
     */
    public function __construct($Planet)
    {    
        if($Planet!=null)
        {

            //get discovering address by replacing some unnecessary 0's
            $addressDisc = str_replace("000000000000000000000000","",$Planet->topics[1]);

            //split the datastring into useable parts
            $dataArray = str_split(substr($Planet->data,2),64);

            $this->idPlanet = hexdec(substr($Planet->topics[2],2));

            $this->addressDiscoverer = $addressDisc;

            $this->idResource1 = hexdec($dataArray[4]);
            $this->idResource2 = hexdec($dataArray[5]);
            $this->idResource3 = hexdec($dataArray[6]);
            $this->amountResource1 = hexdec($dataArray[9]);
            $this->amountResource2 = hexdec($dataArray[10]);
            $this->amountResource3 = hexdec($dataArray[11]);
            $this->people = hexdec($dataArray[8]);
            $this->rarity = hexdec($dataArray[2]);
            $this->sectorX = hexdec($dataArray[0]);
            $this->sectorY = hexdec($dataArray[1]);
            $this->name = $this->idPlanet;
            $this->creationTX = $Planet->transactionHash;
            $this->discInBlock = hexdec($Planet->blockNumber);


        }
    }

    public function __toString()
    {
        var_dump($this);
        return "".$this;
    }


}
