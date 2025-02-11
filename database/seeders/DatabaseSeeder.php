<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Name;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->dogNames() as $name) {
            Name::create(['name' => $name]);
        }
    }

    private function dogNames()
    {
        return [
            'Ajax', 'Ares', 'Ammo', 'Axel', 'Bane', 'Beast', 'Blaze', 'Blitz', 'Bones', 'Bolt', 'Boss', 'Bruiser', 'Brutus', 'Bullet', 'Butch', 'Bluto', 'Dagger', 'Danger', 'Diesel', 'Fang', 'Goliath', 'Chopper', 'Gunner ', 'Hades', 'Hercules', 'Hulk', 'King', 'Maverick', 'Nitro', 'Pyro', 'Rambo', 'Riptide', 'Rocky', 'Rogue', 'Samson', 'Sarge', 'Spike', 'Tank', 'T-Bone', 'Titan', 'Thor', 'Trapper', 'Vader', 'Viper', 'Cornflakes', 'Bella', 'Daisy', 'Luna', 'Bailey', 'Willow', 'Coco', 'Roxy', 'Addie', 'Bambi', 'Lola', 'Nala', 'Harper', 'Ava', 'Piper', 'Hazel', 'Angel', 'Sadie', 'Zoey', 'Belle', 'Dixie', 'Gracie', 'Ellie', 'Addison', 'Biscuit', 'Bluey', 'Winnie', 'Cleo', 'A.J.', 'Millie', 'Honey', 'Cookie', 'Amber', 'Lucy', 'Alice', 'Maisy', 'Oreo', 'Chloe', 'Ella', 'Kiki', 'Poppy', 'Lulu', 'Koda', 'Penny', 'Pixie', 'Maggie', 'Buttercup', 'Paris', 'Ruby', 'Molly', 'Pippa', '50 Scent', 'Al Poo-chino', 'Andy War-Howl', 'Arfer Fonzarelli', 'Arf Vader', 'Bark E. Bark', 'Bark Griswold', 'Bark Obama', 'Bark Twain', 'Bark Wahlberg', 'Beowoof', 'Benedict Cumberbark', 'Bilbo Waggins', 'Bill Furry', 'Bite D. Eisenhowler', 'Black Labbath', 'Bob Scratchit', 'Boba Fetch', 'Bone, James Bone', 'Chewbarka', 'Chewy Lewis', 'Colin Howl', 'Dingo Starr', 'Dogstoyevsky', 'Droolius Caesar', 'Dumbledog', 'Fleasy E', 'Franz Fur-dinand', 'Fresh Prints', 'Furcules', 'Fur-Dinand', 'Fuzz Aldrin', 'Fyodor Dogstoevsky', 'George Bernard Paw', 'Groucho Barks', 'Hairy Houndini', 'Hairy Paw-ter', 'Heel Armstrong', 'Howly Mandel', 'Indiana Bones', 'Jabba the Mutt', 'Jake Gyllenpaw', 'James Earl Bones', 'Jimmy Chew', 'Jon Bone Jovi', 'Jude Paw', 'Kareem Abdul Ja-Bark', 'Karl Barx', 'Kanye Westie', 'Lick Jagger', 'Little Bow Wow', 'L.L. Drool J', 'Luke Skybarker', 'Mutt Damon', 'Muttley Crew', 'Nine Inch Tails', 'Notorious D.O.G', 'Obi Wag Kenobi', 'Orville Redenbarker', 'Ozzy Pawsborne', 'Pablo Escobark', 'Paw-casso', 'Ron Fleasly', 'Ryan Fleacrest', 'Salvador Dogi', 'Santa Paws', 'Sheddy Krueger', 'Sherlock Bones', 'Sir Arthur Canine Doyle', 'Snarls Barkley', 'Snoop Doggie Dog', 'Spark Pug', 'Taylor Pawtner', 'The Notorious D.O.G.', 'Val Kibble', 'William Shakespaw', 'Winston Furchill', 'Woof Blitzer', 'Woofgang Amadeus', 'Woofgang Puck'
        ];
    }
}
