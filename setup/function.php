<?php 
 
 /*
 * function.php
 * 
 * Copyright 2018 Thorwald <thorwald@thorwald-AO532h>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

include('setup.php');



function controllo_loci($locus){
	
	
	if($locus = 'a_lr'){ $locus_return ='locus_a';}
	if($locus = 'b_lr') {$locus_return ='locus_b';}
	if($locus = 'c_lr') {$locus_return ='locus_c';}
	if($locus = 'dr_lr') {$locus_return ='locus_dr';}
	if($locus = 'dq_lr'){ $locus_return ='locus_dqb';}
	if($locus = 'dqa_lr') {$locus_return ='locus_dqa';}
	if($locus = 'dp_lr') {$locus_return ='locus_dp';}
	
	
	return $locus_return;
	
}


?>
