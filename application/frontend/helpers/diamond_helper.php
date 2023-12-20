<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  function diaVar($type)
  {
    $varShape = array (
        array ( id => 'idshaperound', name => 'Round', value => 'ROUND', img => 'round.png' ),
        array ( id => 'idshapeprincess', name => 'Princess', value => 'PRINCESS', img => 'princess.png' ),
        array ( id => 'idshapecushion', name => 'Cushion', value => 'CUSHION', img => 'cushion.png' ),
        array ( id => 'idshaperadiant', name => 'Radiant', value => 'RADIANT', img => 'radiant.png' ),
        array ( id => 'idshapeasscher', name => 'Asscher', value => 'ASSCHER', img => 'asscher.png' ),
        array ( id => 'idshapeemerald', name => 'Emerald', value => 'EMERALD', img => 'emerald.png' ),
        array ( id => 'idshapeoval', name => 'Oval', value => 'OVAL', img => 'oval.png' ),
        array ( id => 'idshapepear', name => 'Pear', value => 'PEAR', img => 'pear.png' ),
        array ( id => 'idshapemarquise', name => 'Marquise', value => 'MARQUISE', img => 'marquise.png' ),
        array ( id => 'idshapeheart', name => 'Heart', value => 'HEART', img => 'heart.png' ),
        array ( id => 'idshapeother', name => 'Other', value => 'OTHER', img => 'other.png' )
    );
    $varColor = array (
        array ( id => 'col_d', name => 'D', value => 'D' ),
        array ( id => 'col_e', name => 'E', value => 'E' ),
        array ( id => 'col_f', name => 'F', value => 'F' ),
        array ( id => 'col_g', name => 'G', value => 'G' ),
        array ( id => 'col_h', name => 'H', value => 'H' ),
        array ( id => 'col_i', name => 'I', value => 'I' ),
        array ( id => 'col_j', name => 'J', value => 'J' ),
        array ( id => 'col_k', name => 'K', value => 'K' ),
        array ( id => 'col_l', name => 'L', value => 'L' ),
        array ( id => 'col_m', name => 'M', value => 'M' ),
        array ( id => 'col_n', name => 'N-', value => 'N-' )
    );
    $varClarity = array (
        array ( id => 'FL', name => 'FL', value => 'FL' ),
        array ( id => 'IF', name => 'IF', value => 'IF' ),
        array ( id => 'VVS1', name => 'VVS1', value => 'VVS1' ),
        array ( id => 'VVS2', name => 'VVS2', value => 'VVS2' ),
        array ( id => 'VS1', name => 'VS1', value => 'VS1' ),
        array ( id => 'VS2', name => 'VS2', value => 'VS2' ),
        array ( id => 'SI1', name => 'SI1', value => 'SI1' ),
        array ( id => 'SI2', name => 'SI2', value => 'SI2' ),
        array ( id => 'I1-', name => 'I1-', value => 'I1-' )
    );
    $varCut = array (
        array ( id => 'ex_cut', name => 'EX', value => 'EX' ),
        array ( id => 'vg_cut', name => 'VG', value => 'VG' ),
        array ( id => 'gd_cut', name => 'GD', value => 'GD' ),
        array ( id => 'fr_cut', name => 'FR-', value => 'FR-' )
    );
    $varPolish = array (
        array ( id => 'ex_polish', name => 'EX', value => 'EX' ),
        array ( id => 'vg_polish', name => 'VG', value => 'VG' ),
        array ( id => 'gd_polish', name => 'GD', value => 'GD' ),
        array ( id => 'fr_polish', name => 'FR-', value => 'FR-' )
    );
    $varSymmetry = array (
        array ( id => 'ex_symmetry', name => 'EX', value => 'EX' ),
        array ( id => 'vg_symmetry', name => 'VG', value => 'VG' ),
        array ( id => 'gd_symmetry', name => 'GD', value => 'GD' ),
        array ( id => 'fr_symmetry', name => 'FR-', value => 'FR-' )
    );
    $varFluor = array (
        array ( id => 'non_fluor', name => 'NON', value => 'NON' ),
        array ( id => 'fnt_fluor', name => 'FNT', value => 'FNT' ),
        array ( id => 'med_fluor', name => 'MED', value => 'MED' ),
        array ( id => 'stg_fluor', name => 'STG', value => 'STG' ),
        array ( id => 'vst_fluor', name => 'VST', value => 'VST' )
    );
    $varHA = array (
        array ( id => 'ha-EX', name => 'EX', value => 'EX H&A' ),
        array ( id => 'ha-VG', name => 'VG', value => 'VG H&A' ),
        array ( id => 'ha-GD', name => 'GD', value => 'GD H&A' )
    );
    $varBrand = array (
        array ( id => 'brand-CANADAMARK', name => 'CANADAMARK', value => 'CANADA' ),
        array ( id => 'brand-VG', name => 'VG H&A', value => 'VG H&A' ),
        array ( id => 'brand-EX', name => 'EX H&A', value => 'EX H&A' ),
        array ( id => 'brand-CAN', name => 'CAN H&A', value => 'CAN H&A' )
    );
    $varCulet = array (
        array ( id => 'culet-NON', name => 'NON', value => 'NON' ),
        array ( id => 'culet-VSM', name => 'VSM', value => 'VSM' ),
        array ( id => 'culet-SML', name => 'SML', value => 'SML' ),
        array ( id => 'culet-MED', name => 'MED', value => 'MED' ),
        array ( id => 'culet-LARGE', name => 'LARGE', value => 'LARGE' )
    );
    $varPointer1 = array (
        array ( id => 'po-0.30-0.34', name => '0.30-0.34', value => '0.30-0.34' ),
        array ( id => 'po-0.40-0.49', name => '0.40-0.49', value => '0.40-0.49' ),
        array ( id => 'po-0.60-0.69', name => '0.60-0.69', value => '0.60-0.69' ),
        array ( id => 'po-0.80-0.89', name => '0.80-0.89', value => '0.80-0.89' ),
        array ( id => 'po-0.95-0.99', name => '0.95-0.99', value => '0.95-0.99' ),
        array ( id => 'po-1.10-1.19', name => '1.10-1.19', value => '1.10-1.19' ),
        array ( id => 'po-1.30-1.39', name => '1.30-1.39', value => '1.30-1.39' ),
        array ( id => 'po-1.50-1.69', name => '1.50-1.69', value => '1.50-1.69' ),
        array ( id => 'po-2.00-2.49', name => '2.00-2.49', value => '2.00-2.49' ),
        array ( id => 'po-3.00-3.99', name => '3.00-3.99', value => '3.00-3.99' ),
        array ( id => 'po-5.00-5.99', name => '5.00-5.99', value => '5.00-5.99' )
    );
    $varPointer2 = array (
        array ( id => 'po-0.35-0.39', name => '0.35-0.39', value => '0.35-0.39' ),
        array ( id => 'po-0.50-0.59', name => '0.50-0.59', value => '0.50-0.59' ),
        array ( id => 'po-0.70-0.79', name => '0.70-0.79', value => '0.70-0.79' ),
        array ( id => 'po-0.90-0.94', name => '0.90-0.94', value => '0.90-0.94' ),
        array ( id => 'po-1.00-1.09', name => '1.00-1.09', value => '1.00-1.09' ),
        array ( id => 'po-1.20-1.29', name => '1.20-1.29', value => '1.20-1.29' ),
        array ( id => 'po-1.40-1.49', name => '1.40-1.49', value => '1.40-1.49' ),
        array ( id => 'po-1.70-1.99', name => '1.70-1.99', value => '1.70-1.99' ),
        array ( id => 'po-2.50-2.99', name => '2.50-2.99', value => '2.50-2.99' ),
        array ( id => 'po-4.00-4.99', name => '4.00-4.99', value => '4.00-4.99' ),
        array ( id => 'po-6.00-100', name => '6.00+', value => '6.00-100' ),
    );
    $varKeyToSym = array (
        array ( id => 'keytosym-1', name => 'Bearding', value => 'Bearding' ),
        array ( id => 'keytosym-2', name => 'Brown patch of color', value => 'Brown patch of color' ),
        array ( id => 'keytosym-3', name => 'Bruise', value => 'Bruise' ),
        array ( id => 'keytosym-4', name => 'Cavity', value => 'Cavity' ),
        array ( id => 'keytosym-5', name => 'Chip', value => 'Chip' ),
        array ( id => 'keytosym-6', name => 'Cleavage', value => 'Cleavage' ),
        array ( id => 'keytosym-7', name => 'Cloud', value => 'Cloud' ),
        array ( id => 'keytosym-8', name => 'Crystal', value => 'Crystal' ),
        array ( id => 'keytosym-9', name => 'Crystal Surface', value => 'Crystal Surface' ),
        array ( id => 'keytosym-10', name => 'Etch Channel', value => 'Etch Channel' ),
        array ( id => 'keytosym-11', name => 'Extra Facet', value => 'Extra Facet' ),
        array ( id => 'keytosym-12', name => 'Feather', value => 'Feather' ),
        array ( id => 'keytosym-13', name => 'Flux Remnant', value => 'Flux Remnant' ),
        array ( id => 'keytosym-14', name => 'Indented Natural', value => 'Indented Natural' ),
        array ( id => 'keytosym-15', name => 'Internal Graining', value => 'Internal Graining' ),
        array ( id => 'keytosym-16', name => 'Internal Inscription', value => 'Internal Inscription' ),
        array ( id => 'keytosym-17', name => 'Internal Laser Drilling', value => 'Internal Laser Drilling' ),
        array ( id => 'keytosym-18', name => 'Knot', value => 'Knot' ),
        array ( id => 'keytosym-19', name => 'Laser Drill Hole', value => 'Laser Drill Hole' ),
        array ( id => 'keytosym-20', name => 'Manufacturing Remnant', value => 'Manufacturing Remnant' ),
        array ( id => 'keytosym-21', name => 'Minor Details of Polish', value => 'Minor Details of Polish' ),
        array ( id => 'keytosym-22', name => 'Natural', value => 'Natural' ),
        array ( id => 'keytosym-23', name => 'Needle', value => 'Needle' ),
        array ( id => 'keytosym-24', name => 'No Inclusion', value => 'No Inclusion' ),
        array ( id => 'keytosym-25', name => 'Pinpoint', value => 'Pinpoint' ),
        array ( id => 'keytosym-26', name => 'Reflecting Surface Graining', value => 'Reflecting Surface Graining' ),
        array ( id => 'keytosym-27', name => 'Surface Graining', value => 'Surface Graining' ),
        array ( id => 'keytosym-28', name => 'Twinning Wisp', value => 'Twinning Wisp' )
    );

    $var = array();

    if($type == 'varShape') {
      $var = $varShape;
    } else if($type == 'varColor') {
      $var = $varColor;
    } else if($type == 'varClarity') {
      $var = $varClarity;
    } else if($type == 'varCut') {
      $var = $varCut;
    } else if($type == 'varPolish') {
      $var = $varPolish;
    } else if($type == 'varSymmetry') {
      $var = $varSymmetry;
    } else if($type == 'varFluor') {
      $var = $varFluor;
    } else if($type == 'varHA') {
      $var = $varHA;
    } else if($type == 'varCulet') {
      $var = $varCulet;
    } else if($type == 'varBrand') {
      $var = $varBrand;
    } else if($type == 'varKeyToSym') {
      $var = $varKeyToSym;
    } else if($type == 'varPointer1') {
      $var = $varPointer1;
    } else if($type == 'varPointer2') {
      $var = $varPointer2;
    }
    return  $var;
  }
