             
				<h3>بيانات مالك السيارة </h3>
					<section>

				@include ('customers.form_cust', [
								'customers' => null,
							])

		

				</section>

				<h3>بيانات السيارة</h3>
				<section>

					@include ('customers.form_car', [
								'customers' => null,
							])			
			   
				</section>
				<h3>العنوان بالخارج</h3>
				<section>
		
				@include ('customers.form_gua', [
					'customers' => null,
				])	
				
													
                       
				</section>
				<h3>العنوان داخل السودان</h3>
				<section>
				@include ('customers.form_cus_address', [
															'customers' => null,
														])
																	
					
				</section>
	
	
	
	
	
	
	
	

