<?php

class BreedTableSeeder extends Seeder
{

	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		DogBreed::truncate();

		$data = array(
			'Affenpinscher',
			'Australian Silky Terrier',
			'Bichon Frise',
			'Cavalier King Charles Spaniel',
			'Chihuahua (Long Coat)',
			'Chihuahua (Smooth Coat)',
			'Chinese Crested Dog ',
			'English Toy Terrier (Black & Tan)',
			'Griffon Bruxellois',
			'Havanese',
			'Italian Greyhound',
			'Japanese Chin ',
			'King Charles Spaniel',
			'Lowchen (Little Lion Dog) ',
			'Maltese',
			'Miniature Pinscher',
			'Papillon ',
			'Pekingese',
			'Pomeranian',
			'Pug',
			'Russian Toy (Russkiy Toy) ',
			'Tibetan Spaniel',
			'Yorkshire Terrier',
		);

		$data2 = array(
			'Airedale Terrier',
			'American Staffordshire Terrier',
			'Australian Terrier',
			'Bedlington Terrier ',
			'Border Terrier ',
			'Bull Terrier ',
			'Bull Terrier (Miniature)',
			'Cairn Terrier',
			'Cesky Terrier',
			'Dandie Dinmont Terrier ',
			'Fox Terrier (Smooth)',
			'Fox Terrier (Wire) ',
			'German Hunting Terrier',
			'Glen Of Imaal Terrier',
			'Irish Terrier',
			'Jack Russell Terrier',
			'Kerry Blue Terrier ',
			'Lakeland Terrier ',
			'Manchester Terrier',
			'Norfolk Terrier',
			'Norwich Terrier',
			'Parson Russell Terrier ',
			'Scottish Terrier ',
			'Sealyham Terrier',
			'Skye Terrier ',
			'Soft Coated Wheaten Terrier',
			'Staffordshire Bull Terrier',
			'Tenterfield Terrier',
			'Welsh Terrier',
			'West Highland White Terrier',
		);

		$data3 = array(
			'Brittany',
			'Chesapeake Bay Retriever',
			'Clumber Spaniel',
			'Cocker Spaniel',
			'Cocker Spaniel (American)',
			'Curly Coated Retriever',
			'English Setter',
			'English Springer Spaniel',
			'Field Spaniel',
			'Flat Coated Retriever',
			'German Shorthaired Pointer',
			'German Wirehaired Pointer',
			'Golden Retriever',
			'Gordon Setter',
			'Hungarian Vizsla',
			'Hungarian Wirehaired Vizsla',
			'Irish Red and White Setter',
			'Irish Setter',
			'Irish Water Spaniel',
			'Italian Spinone',
			'Labrador Retriever',
			'Lagotto Romagnolo',
			'Large Munsterlander',
			'Nova Scotia Duck Tolling Retriever',
			'Pointer',
			'Sussex Spaniel',
			'Weimaraner ',
			'Weimaraner (Longhair)',
			'Welsh Springer Spaniel',
		);
		
		$data4 = array(
			'Afghan Hound',
			'Azawakh',
			'Basenji',
			'Basset Fauve De Bretagne',
			'Basset Hound',
			'Beagle',
			'Bloodhound',
			'Bluetick Coonhound',
			'Borzoi',
			'Dachshund',
			'Deerhound',
			'Finnish Spitz',
			'Foxhound ',
			'Grand Basset Griffon Vendeen',
			'Greyhound',
			'Hamiltonstovare',
			'Harrier ',
			'Ibizan Hound',
			'Irish Wolfhound',
			'Norwegian Elkhound',
			'Otterhound',
			'Petit Basset Griffon Vendeen ',
			'Pharaoh Hound ',
			'Portuguese Podengo',
			'Rhodesian Ridgeback',
			'Saluki',
			'Sloughi',
			'Whippet',
		);

		$data5 = array(
			'Australian Cattle Dog',
			'Australian Kelpie ',
			'Australian Shepherd',
			'Australian Stumpy Tail Cattle Dog',
			'Bearded Collie',
			'Belgian Shepherd Dog (Groenendael, Tervueren, Laekenois, Malinois)',
			'Bergamasco Shepherd Dog',
			'Border Collie',
			'Bouvier Des Flandres',
			'Briard ',
			'Collie (Rough)',
			'Collie (Smooth)',
			'Dutch Shepherd Dog',
			'Finnish Lapphund',
			'German Shepherd Dog',
			'German Shepherd Dog (Long Stock Coat)',
			'Komondor',
			'Kuvasz ',
			'Maremma Sheepdog',
			'Norwegian Buhund',
			'Old English Sheepdog',
			'Polish Lowland Sheepdog',
			'Puli',
			'Pumi',
			'Pyrenean Sheepdog Longhaired',
			'Shetland Sheepdog',
			'Swedish Lapphund',
			'Swedish Vallhund',
			'Welsh Corgi (Cardigan) ',
			'Welsh Corgi (Pembroke)',
			'White Swiss Shepherd Dog',
		);
		$data6 = array(
			'Akita',
			'Akita (Japanese)',
			'Alaskan Malamute',
			'Anatolian Shepherd Dog',
			'Bernese Mountain Dog',
			'Boxer',
			'Bullmastiff',
			'Canadian Eskimo Dog',
			'Cane Corso',
			'Central Asian Shepherd Dog',
			'Dobermann',
			'Dogue de Bordeaux',
			'German Pinscher ',
			'Leonberger',
			'Mastiff',
			'Neapolitan Mastiff',
			'Newfoundland',
			'Portuguese Water Dog',
			'Pyrenean Mastiff',
			'Pyrenean Mountain Dog',
			'Rottweiler',
			'Russian Black Terrier',
			'Samoyed',
			'Schnauzer',
			'Schnauzer (Giant)',
			'Schnauzer (Miniature)',
			'Shiba Inu',
			'Siberian Husky',
			'Spanish Mastiff',
			'St. Bernard',
			'Tatra Shepherd Dog',
			'Tibetan Mastiff',
		);
		$data7 = array(
			'Boston Terrier',
			'British Bulldog',
			'Canaan Dog ',
			'Chow Chow ',
			'Dalmatian',
			'Eurasier',
			'French Bulldog',
			'German Spitz (Mittel & Klein)',
			'Great Dane',
			'Japanese Spitz',
			'Keeshond',
			'Lhasa Apso',
			'Peruvian Hairless Dog (Large)',
			'Peruvian Hairless Dog (Medium)',
			'Peruvian Hairless Dog (Small)',
			'Poodle (Miniature)',
			'Poodle (Standard)',
			'Poodle (Toy)',
			'Schipperke',
			'Shar Pei',
			'Shih Tzu',
			'Tibetan Terrier',
			'Xoloitzcuintle',
		);
		foreach($data as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 1	
			]);	
		}
		foreach($data2 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 2 	
			]);	
		}
		foreach($data3 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 3	
			]);	
		}
		foreach($data4 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 4	
			]);	
		}
		foreach($data5 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 5	
			]);	
		}
		foreach($data6 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 6	
			]);	
		}
		foreach($data7 as $item){
			DogBreed::create([
				'name' => $item,
				'breedtype_id' => 7	
			]);	
		}
	}

}

