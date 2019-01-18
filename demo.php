<?php

public function pdf(){
        vendor('TCPDF.tcpdf');
        $letter=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // 设置打印模式
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('demo');
        $pdf->SetTitle('demo');
        $pdf->SetSubject('demo');
        $pdf->SetKeywords('demo, PDF,');
        // 是否显示页眉
        $pdf->setPrintHeader(false);
        // 设置页眉显示的内容
        $pdf->SetHeaderData('logo.png', 60, 'www.demo.com', 'demo', array(0,64,255), array(0,64,128));
        // 设置页眉字体
        $pdf->setHeaderFont(Array('dejavusans', '', '12'));
        // 页眉距离顶部的距离
        $pdf->SetHeaderMargin('5');
        // 是否显示页脚
        $pdf->setPrintFooter(true);
        // 设置页脚显示的内容
        $pdf->setFooterData(array(0,64,0), array(0,64,128));
        // 设置页脚的字体
        $pdf->setFooterFont(Array('dejavusans', '', '10'));
        // 设置页脚距离底部的距离
        $pdf->SetFooterMargin('10');
        // 设置默认等宽字体
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // 设置行高
        $pdf->setCellHeightRatio(1);
        // 设置左、上、右的间距
        $pdf->SetMargins('10', '10', '10');
        // 设置是否自动分页  距离底部多少距离时分页
        $pdf->SetAutoPageBreak(true, '15');
        // 设置图像比例因子
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->setFontSubsetting(true);
        $pdf->AddPage();
        $allhtml='<span>TCPDF DEMO</span>';
        $pdf->SetFont('stsongstdlight', '', 14, '', true);
        $pdf->writeHTMLCell(0, 0, '', '', $allhtml, 0, 1, 0, true, '', true);
        $pdf->Output('example_001.pdf', 'I');
}

?>