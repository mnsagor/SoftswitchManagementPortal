<?php


namespace App\Http\Utills;


class Scripts
{
    public $requestType;
    public $phoneNumber;
    public $agwIp;
    public $tid;
    public $zoneId;
    public $moduleId;
    public $csc;

    public static function getNewConnectionScript($phoneNumber,$agwIp,$tid,$zoneId,$moduleId,$csc){


        $newConnectionScript = "ADD VSBR: D=K'".$phoneNumber.", LP=0, DID=ESL, MN=".$moduleId.", EID=\"".$agwIp.
            ":2944\", TID=\"".$tid."\", RCHS=0, CSC=".$csc.", UTP=NRM, ICR=LCO-1&LC-1&LCT-1&NTT-1&ITT-1&ICTX-1&ICCTX-".
            "1&INTT-1&IITT-1&TFL-1&ICLT-1&ICDDD-1&ICIDD-1&IOLT-1&CCO1-1&CCO2-1&CCO3-1&CCO4-1&CCO5-1&CCO6-1&CCO7".
            "-1&CCO8-1&CCO9-1&CCO10-1&CCO11-1&CCO12-1&CCO13-1&CCO14-1&CCO15-1&CCO16-1, OCR=LCO-1&LC-1&LCT-1&NTT-".
            "1&ITT-0&ICTX-0&OCTX-0&INTT-0&IITT-0&OFL-0&ICLT-0&ICDDD-0&ICIDD-0&IOLT-0&CCO1-0&CCO2-0&CCO3-0&CCO4-".
            "0&CCO5-0&CCO6-0&CCO7-0&CCO8-0&CCO9-0&CCO10-0&CCO11-0&CCO12-0&CCO13-0&CCO14-0&CCO15-0&CCO16-0, NS=ADI-".
            "0&HLI-0&CBA-1&DDB-0&MCT-0&WAKE-0&RCL-0&CFU-0&CFB-0&CFNR-0&CCA-0&CW-0&BCB-0&TRIPTY-0&CONF-0&GAA-".
            "0&DAN-0&CTR-0&CLIP-1&CLIR-0&RIO-0&RIP-0&RID-0&HOLD-0&AOCS-0&AOCD-0&AOCE-0&CCBS-0&DLC-0&SCR-0&SPL".
            "-0&TCIP-0&TCIR-0&CIDCW-0&DNCALW-0&PWDCAL-0&RACF-0&BTB-0&CCW-0&NUMI-0&CANMV-0&CNAM-0&CHT-0&RCLIR-0&OCB".
            "-0&PKO-0&INQY-0&BHLD-0&MWI-0&ICIB-0&IIFC-0&BSYTOB-0&NASTB-0&VMWN-0&REGC-0&IGAA-0&DDWA-0&CCT-0&CIND-0&XEXH".
            "-0&XEGJ-0&QR-0&XSXH-0&ICENCF-0&CFT-0&CFO-0&CWCFNR-0&CFUM-0&SCF-0&SCA-0&SCRJ-0&SUDND-0&CFUCS-0&HKMWN-0&CCS-".
            "0&PARK-0&EBO-0&BRGIN-0&CT3WAY-0&ASI-0&PWCB-0&SCW-0&ICM-0&OCM-0&DRG-0&CFIO-0&CFGO-0&CTGO-0&CTIO-0&MCTCLR-".
            "0&CWO-0&CWT-0&CLIU-0&QFEE-0&MRST-0&IVRMP-0&RCSS-0&CCNR-0&CTC-0&CCL-0&CCWFAX-0&CCWCHG-0&MOH-0&QSNS-0&QSNO-".
            "0&CFUF-0&PCT-0&GFR-0&CTNR-0&CTOO-0&CTIOC-0&PRS-0&CRBT-0, CNTRX=NO, PBX=NO, CHG=NO, ENH=NO;";

//        dd($newConnectionScript);

        return $newConnectionScript;
    }

    public static function getReConnectionScript($phoneNumber,$agwIp,$tid,$zoneId,$moduleId,$csc){

        $reConnectionScript = "ADD VSBR: D=K'".$phoneNumber.", LP=0, DID=ESL, MN=".$moduleId.", EID=\"".$agwIp.
            ":2944\", TID=\"".$tid."\", RCHS=0, CSC=".$csc.", UTP=NRM, ICR=LCO-1&LC-1&LCT-1&NTT-1&ITT-1&ICTX-1&ICCTX-".
            "1&INTT-1&IITT-1&TFL-1&ICLT-1&ICDDD-1&ICIDD-1&IOLT-1&CCO1-1&CCO2-1&CCO3-1&CCO4-1&CCO5-1&CCO6-1&CCO7".
            "-1&CCO8-1&CCO9-1&CCO10-1&CCO11-1&CCO12-1&CCO13-1&CCO14-1&CCO15-1&CCO16-1, OCR=LCO-1&LC-1&LCT-1&NTT-".
            "1&ITT-0&ICTX-0&OCTX-0&INTT-0&IITT-0&OFL-0&ICLT-0&ICDDD-0&ICIDD-0&IOLT-0&CCO1-0&CCO2-0&CCO3-0&CCO4-".
            "0&CCO5-0&CCO6-0&CCO7-0&CCO8-0&CCO9-0&CCO10-0&CCO11-0&CCO12-0&CCO13-0&CCO14-0&CCO15-0&CCO16-0, NS=ADI-".
            "0&HLI-0&CBA-1&DDB-0&MCT-0&WAKE-0&RCL-0&CFU-0&CFB-0&CFNR-0&CCA-0&CW-0&BCB-0&TRIPTY-0&CONF-0&GAA-".
            "0&DAN-0&CTR-0&CLIP-1&CLIR-0&RIO-0&RIP-0&RID-0&HOLD-0&AOCS-0&AOCD-0&AOCE-0&CCBS-0&DLC-0&SCR-0&SPL".
            "-0&TCIP-0&TCIR-0&CIDCW-0&DNCALW-0&PWDCAL-0&RACF-0&BTB-0&CCW-0&NUMI-0&CANMV-0&CNAM-0&CHT-0&RCLIR-0&OCB".
            "-0&PKO-0&INQY-0&BHLD-0&MWI-0&ICIB-0&IIFC-0&BSYTOB-0&NASTB-0&VMWN-0&REGC-0&IGAA-0&DDWA-0&CCT-0&CIND-0&XEXH".
            "-0&XEGJ-0&QR-0&XSXH-0&ICENCF-0&CFT-0&CFO-0&CWCFNR-0&CFUM-0&SCF-0&SCA-0&SCRJ-0&SUDND-0&CFUCS-0&HKMWN-0&CCS-".
            "0&PARK-0&EBO-0&BRGIN-0&CT3WAY-0&ASI-0&PWCB-0&SCW-0&ICM-0&OCM-0&DRG-0&CFIO-0&CFGO-0&CTGO-0&CTIO-0&MCTCLR-".
            "0&CWO-0&CWT-0&CLIU-0&QFEE-0&MRST-0&IVRMP-0&RCSS-0&CCNR-0&CTC-0&CCL-0&CCWFAX-0&CCWCHG-0&MOH-0&QSNS-0&QSNO-".
            "0&CFUF-0&PCT-0&GFR-0&CTNR-0&CTOO-0&CTIOC-0&PRS-0&CRBT-0, CNTRX=NO, PBX=NO, CHG=NO, ENH=NO;";

//        dd($newConnectionScript);

        return $reConnectionScript;

    }

    public static function getCasualConnectionScript($phoneNumber,$agwIp,$tid,$zoneId,$moduleId,$csc){

        $casualConnectionScript = "ADD VSBR: D=K'".$phoneNumber.", LP=0, DID=ESL, MN=".$moduleId.", EID=\"".$agwIp.
            ":2944\", TID=\"".$tid."\", RCHS=0, CSC=".$csc.", UTP=NRM, ICR=LCO-1&LC-1&LCT-1&NTT-1&ITT-1&ICTX-1&ICCTX-".
            "1&INTT-1&IITT-1&TFL-1&ICLT-1&ICDDD-1&ICIDD-1&IOLT-1&CCO1-1&CCO2-1&CCO3-1&CCO4-1&CCO5-1&CCO6-1&CCO7".
            "-1&CCO8-1&CCO9-1&CCO10-1&CCO11-1&CCO12-1&CCO13-1&CCO14-1&CCO15-1&CCO16-1, OCR=LCO-1&LC-1&LCT-1&NTT-".
            "1&ITT-0&ICTX-0&OCTX-0&INTT-0&IITT-0&OFL-0&ICLT-0&ICDDD-0&ICIDD-0&IOLT-0&CCO1-0&CCO2-0&CCO3-0&CCO4-".
            "0&CCO5-0&CCO6-0&CCO7-0&CCO8-0&CCO9-0&CCO10-0&CCO11-0&CCO12-0&CCO13-0&CCO14-0&CCO15-0&CCO16-0, NS=ADI-".
            "0&HLI-0&CBA-1&DDB-0&MCT-0&WAKE-0&RCL-0&CFU-0&CFB-0&CFNR-0&CCA-0&CW-0&BCB-0&TRIPTY-0&CONF-0&GAA-".
            "0&DAN-0&CTR-0&CLIP-1&CLIR-0&RIO-0&RIP-0&RID-0&HOLD-0&AOCS-0&AOCD-0&AOCE-0&CCBS-0&DLC-0&SCR-0&SPL".
            "-0&TCIP-0&TCIR-0&CIDCW-0&DNCALW-0&PWDCAL-0&RACF-0&BTB-0&CCW-0&NUMI-0&CANMV-0&CNAM-0&CHT-0&RCLIR-0&OCB".
            "-0&PKO-0&INQY-0&BHLD-0&MWI-0&ICIB-0&IIFC-0&BSYTOB-0&NASTB-0&VMWN-0&REGC-0&IGAA-0&DDWA-0&CCT-0&CIND-0&XEXH".
            "-0&XEGJ-0&QR-0&XSXH-0&ICENCF-0&CFT-0&CFO-0&CWCFNR-0&CFUM-0&SCF-0&SCA-0&SCRJ-0&SUDND-0&CFUCS-0&HKMWN-0&CCS-".
            "0&PARK-0&EBO-0&BRGIN-0&CT3WAY-0&ASI-0&PWCB-0&SCW-0&ICM-0&OCM-0&DRG-0&CFIO-0&CFGO-0&CTGO-0&CTIO-0&MCTCLR-".
            "0&CWO-0&CWT-0&CLIU-0&QFEE-0&MRST-0&IVRMP-0&RCSS-0&CCNR-0&CTC-0&CCL-0&CCWFAX-0&CCWCHG-0&MOH-0&QSNS-0&QSNO-".
            "0&CFUF-0&PCT-0&GFR-0&CTNR-0&CTOO-0&CTIOC-0&PRS-0&CRBT-0, CNTRX=NO, PBX=NO, CHG=NO, ENH=NO;";

//        dd($newConnectionScript);

        return $casualConnectionScript;

    }

    public static function getCasualDisconnectionScript($phoneNumber){

        $casualConnectionScript = "RMV VSBR: D=K'".$phoneNumber.", LP=0;";

//        dd($casualConnectionScript);

        return $casualConnectionScript;

    }

    public static function getRestorationScript($phoneNumber){

        $restorationScript = "RMV OWSBR: SD=K'".$phoneNumber.", LP=0;";
        return $restorationScript;

    }

    public static function getTemporaryDisconnectionScript($phoneNumber){

        $tdScript = "SET OWSBR: SD=K'".$phoneNumber.", LP=0, SETMODE=Manl, OS=IOOF;";
        return $tdScript;
    }

    public static function getPermanentCloseScript($phoneNumber){
        $permanentCloseScript = "RMV VSBR: D=K'".$phoneNumber.", LP=0;";
        return $permanentCloseScript;
    }

    public static function getIsdFacilitiesScript(){}

    public static function getNwdFacilitiesScript(){}

    public static function getNonNwdFacilitiesScript(){}

    public static function getCentrexScript(){}

    public static function getPbxScript(){}

    public static function getHotlineScript(){}

    public static function getOutgoingCallBaringScript(){}

    public static function getIncomingCallBaringScript(){}

    public static function getNumberChangeScript($phoneNumber,$agwIp,$tid,$zoneId,$moduleId,$csc){

        $numberChangeScript = "ADD VSBR: D=K'".$phoneNumber.", LP=0, DID=ESL, MN=".$moduleId.", EID=\"".$agwIp.
            ":2944\", TID=\"".$tid."\", RCHS=0, CSC=".$csc.", UTP=NRM, ICR=LCO-1&LC-1&LCT-1&NTT-1&ITT-1&ICTX-1&ICCTX-".
            "1&INTT-1&IITT-1&TFL-1&ICLT-1&ICDDD-1&ICIDD-1&IOLT-1&CCO1-1&CCO2-1&CCO3-1&CCO4-1&CCO5-1&CCO6-1&CCO7".
            "-1&CCO8-1&CCO9-1&CCO10-1&CCO11-1&CCO12-1&CCO13-1&CCO14-1&CCO15-1&CCO16-1, OCR=LCO-1&LC-1&LCT-1&NTT-".
            "1&ITT-0&ICTX-0&OCTX-0&INTT-0&IITT-0&OFL-0&ICLT-0&ICDDD-0&ICIDD-0&IOLT-0&CCO1-0&CCO2-0&CCO3-0&CCO4-".
            "0&CCO5-0&CCO6-0&CCO7-0&CCO8-0&CCO9-0&CCO10-0&CCO11-0&CCO12-0&CCO13-0&CCO14-0&CCO15-0&CCO16-0, NS=ADI-".
            "0&HLI-0&CBA-1&DDB-0&MCT-0&WAKE-0&RCL-0&CFU-0&CFB-0&CFNR-0&CCA-0&CW-0&BCB-0&TRIPTY-0&CONF-0&GAA-".
            "0&DAN-0&CTR-0&CLIP-1&CLIR-0&RIO-0&RIP-0&RID-0&HOLD-0&AOCS-0&AOCD-0&AOCE-0&CCBS-0&DLC-0&SCR-0&SPL".
            "-0&TCIP-0&TCIR-0&CIDCW-0&DNCALW-0&PWDCAL-0&RACF-0&BTB-0&CCW-0&NUMI-0&CANMV-0&CNAM-0&CHT-0&RCLIR-0&OCB".
            "-0&PKO-0&INQY-0&BHLD-0&MWI-0&ICIB-0&IIFC-0&BSYTOB-0&NASTB-0&VMWN-0&REGC-0&IGAA-0&DDWA-0&CCT-0&CIND-0&XEXH".
            "-0&XEGJ-0&QR-0&XSXH-0&ICENCF-0&CFT-0&CFO-0&CWCFNR-0&CFUM-0&SCF-0&SCA-0&SCRJ-0&SUDND-0&CFUCS-0&HKMWN-0&CCS-".
            "0&PARK-0&EBO-0&BRGIN-0&CT3WAY-0&ASI-0&PWCB-0&SCW-0&ICM-0&OCM-0&DRG-0&CFIO-0&CFGO-0&CTGO-0&CTIO-0&MCTCLR-".
            "0&CWO-0&CWT-0&CLIU-0&QFEE-0&MRST-0&IVRMP-0&RCSS-0&CCNR-0&CTC-0&CCL-0&CCWFAX-0&CCWCHG-0&MOH-0&QSNS-0&QSNO-".
            "0&CFUF-0&PCT-0&GFR-0&CTNR-0&CTOO-0&CTIOC-0&PRS-0&CRBT-0, CNTRX=NO, PBX=NO, CHG=NO, ENH=NO;";

//        dd($newConnectionScript);

        return $numberChangeScript;

    }

    public static function getClosingForShiftingScript($phoneNumber){
        $closingForShiftingScript = "RMV VSBR: D=K'".$phoneNumber.", LP=0;";
        return $closingForShiftingScript;
    }

    public static function getGreenNumberScript(){}

    public static function getCallForwardingScript(){}

    public static function getCallWaitingScript(){}

    public static function getDoNotDisturbScript(){}

    public static function getCallConferenceScript(){}

    public static function getBwListScript(){}

    public static function getAbsenteeSubscriberScript(){}

    public static function getMaliciourCallTraceScript(){}

    public static function getConversionScript($phoneNumber,$agwIp,$tid,$zoneId,$moduleId,$csc){

        $conversionScript = "ADD VSBR: D=K'".$phoneNumber.", LP=0, DID=ESL, MN=".$moduleId.", EID=\"".$agwIp.
            ":2944\", TID=\"".$tid."\", RCHS=0, CSC=".$csc.", UTP=NRM, ICR=LCO-1&LC-1&LCT-1&NTT-1&ITT-1&ICTX-1&ICCTX-".
            "1&INTT-1&IITT-1&TFL-1&ICLT-1&ICDDD-1&ICIDD-1&IOLT-1&CCO1-1&CCO2-1&CCO3-1&CCO4-1&CCO5-1&CCO6-1&CCO7".
            "-1&CCO8-1&CCO9-1&CCO10-1&CCO11-1&CCO12-1&CCO13-1&CCO14-1&CCO15-1&CCO16-1, OCR=LCO-1&LC-1&LCT-1&NTT-".
            "1&ITT-0&ICTX-0&OCTX-0&INTT-0&IITT-0&OFL-0&ICLT-0&ICDDD-0&ICIDD-0&IOLT-0&CCO1-0&CCO2-0&CCO3-0&CCO4-".
            "0&CCO5-0&CCO6-0&CCO7-0&CCO8-0&CCO9-0&CCO10-0&CCO11-0&CCO12-0&CCO13-0&CCO14-0&CCO15-0&CCO16-0, NS=ADI-".
            "0&HLI-0&CBA-1&DDB-0&MCT-0&WAKE-0&RCL-0&CFU-0&CFB-0&CFNR-0&CCA-0&CW-0&BCB-0&TRIPTY-0&CONF-0&GAA-".
            "0&DAN-0&CTR-0&CLIP-1&CLIR-0&RIO-0&RIP-0&RID-0&HOLD-0&AOCS-0&AOCD-0&AOCE-0&CCBS-0&DLC-0&SCR-0&SPL".
            "-0&TCIP-0&TCIR-0&CIDCW-0&DNCALW-0&PWDCAL-0&RACF-0&BTB-0&CCW-0&NUMI-0&CANMV-0&CNAM-0&CHT-0&RCLIR-0&OCB".
            "-0&PKO-0&INQY-0&BHLD-0&MWI-0&ICIB-0&IIFC-0&BSYTOB-0&NASTB-0&VMWN-0&REGC-0&IGAA-0&DDWA-0&CCT-0&CIND-0&XEXH".
            "-0&XEGJ-0&QR-0&XSXH-0&ICENCF-0&CFT-0&CFO-0&CWCFNR-0&CFUM-0&SCF-0&SCA-0&SCRJ-0&SUDND-0&CFUCS-0&HKMWN-0&CCS-".
            "0&PARK-0&EBO-0&BRGIN-0&CT3WAY-0&ASI-0&PWCB-0&SCW-0&ICM-0&OCM-0&DRG-0&CFIO-0&CFGO-0&CTGO-0&CTIO-0&MCTCLR-".
            "0&CWO-0&CWT-0&CLIU-0&QFEE-0&MRST-0&IVRMP-0&RCSS-0&CCNR-0&CTC-0&CCL-0&CCWFAX-0&CCWCHG-0&MOH-0&QSNS-0&QSNO-".
            "0&CFUF-0&PCT-0&GFR-0&CTNR-0&CTOO-0&CTIOC-0&PRS-0&CRBT-0, CNTRX=NO, PBX=NO, CHG=NO, ENH=NO;";

//        dd($newConnectionScript);

        return $conversionScript;

    }

    public static function getEisdScript(){}

    public static function getUnlockScript(){}
}
