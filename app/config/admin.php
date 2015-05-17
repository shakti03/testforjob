<?php

return array(

	'excel_file_path' => 'excel',
	'files' => [
				'questions' => 'questions.xlsx',
				'testset' => 'testset.xlsx',
				'subject' => 'subject-testset.xlsx',
				'company' => 'company-testset.xlsx',
				'subject-difficulty_level' => 'subject-difficulty_level-testset.xlsx',
				'company-difficulty_level' => 'company-difficulty_level-testset.xlsx',
				'company-subject-difficulty_level' => 'company-subject-difficulty_level-testset.xlsx',
				'difficulty_level' => 'difficulty_level-testset.xlsx',
				'company-subject' => 'company-subject-testset.xlsx'
				],
	'test_options' => [			
						'test_types'=> ['aptitude'=>'Aptitude',
										'technical'=>'Technical'
									   ],
						'question_types'=> ['objective' => 'Objective',
											'subjective' => 'Subjective'
										   ],
						'difficulty_levels' => ['fresher' => 'Fresher',
												'experienced' => 'Experienced'
												]						
					],
	'excel_include_columns' => ['company'=>'Company',
								'subject'=>'Subject',
								'difficulty_level'=>'difficulty-level'
								]				
);