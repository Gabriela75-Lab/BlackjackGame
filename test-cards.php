<?php

// public $suit = array ("Hearts", "Spades", "Diamonds","Clubs");
// public $faces = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10","J","Q","K");
// public $values= array();
// 4 types of cards, 13 each = 52 total

class Suit 
{
    public const SUIT_CLUBS = 'Clubs';
    public const SUIT_HEARTS = 'Hearts';
    public const SUIT_DIAMONDS = 'Diamonds';
    public const SUIT_SPADES = 'Spades';

    public const SUIT_TYPES = [Suit::SUIT_CLUBS, Suit::SUIT_HEARTS, Suit::SUIT_SPADES, Suit::SUIT_DIAMONDS];
}

class Card
{ 
    public const CARD_A = 'A';
    public const CARD_2 = '2';
    public const CARD_3 = '3';
    public const CARD_4 = '4';
    public const CARD_5 = '5';
    public const CARD_6 = '6';
    public const CARD_7 = '7';
    public const CARD_8 = '8';
    public const CARD_9 = '9';
    public const CARD_10 ='10';
    public const CARD_J = 'J';
    public const CARD_Q = 'Q';
    public const CARD_K = 'K';
    
    public const CARD_TYPES = [
        Card::CARD_A, 
        Card::CARD_2, 
        Card::CARD_3, 
        Card::CARD_4, 
        Card::CARD_5, 
        Card::CARD_6,
        Card::CARD_7, 
        Card::CARD_8, 
        Card::CARD_9, 
        Card::CARD_10,
        Card::CARD_J, 
        Card::CARD_Q,
        Card::CARD_K,
    ];

    private const CARD_VALUES = [
        Card::CARD_A => [1, 11], 
        Card::CARD_2 => [2], 
        Card::CARD_3 => [3], 
        Card::CARD_4 => [4], 
        Card::CARD_5 => [5], 
        Card::CARD_6 => [6],
        Card::CARD_7 => [7], 
        Card::CARD_8 => [8], 
        Card::CARD_9 => [9], 
        Card::CARD_10=> [10],
        Card::CARD_J => [10],
        Card::CARD_Q => [10],
        Card::CARD_K => [10]];

    public string $suit;
    public string $cardType;

    function __construct (string $suit, string $cardType)
    {
        if (!self::isValidCardType($cardType)) {
            throw new InvalidArgumentException("Invalid card type");
        }

        $this->suit = $suit; 
        $this->cardType = $cardType; 
    }

    private static function isValidCardType($cardType) : bool
    {
        return array_key_exists($cardType, Card::CARD_VALUES); 
    }

    public function getSuit() : string
    {
        return $this->suit;
    }

    public function getCardType() : string
    {
        return $this->cardType;
    }

    public function getValue() 
    {
        return Card::CARD_VALUES[$this->getCardType()];
    }
}

class Deck{

    private $cards = [];

    public function __construct()
    {}

    public static function CreateDeck() : Deck
    {
        $deck = new Deck();
        foreach (Card::CARD_TYPES as $curCardType) {
            foreach (Suit::SUIT_TYPES as $curSuitType) {
                $curCard = new Card($curSuitType, $curCardType);
                $deck->addCard($curCard);
            }
        }
        return $deck;
    } 
    
    // TODO: Implement shuffle
    public function shuffle()
    {
        shuffle($this->cards[]);
    }

    private function addCard(Card $card) 
    {
        $this->cards[] = $card;
    }

    public function getCards()
    {
        return $this->cards;
    } 

}

class Game
{
    private $_deck;

    public function __construct() {
        $this->_deck = Deck::CreateDeck();
        $this->_deck->shuffle();
    }
}

 class Player
 {
    private $name;
    private $hand;

    public function __construct($name, Card $hand)
    {
        $this->name = $name;
        $this->hand = $hand;
    }

    public function getName()
    {
        return $this->name;
    }

    public function drawCard(Card $deck)
    {
        $deck->$this->hand;
    }

    public function getHand()
    {
        return $this->hand;
    }
    
}

class Dealer
{
    private $hand;
    
    public function getHand()
    {
        return $this->hand;
    }
    
}

class Hand
{
    
    
}
    // public function PlayerHand(Player $player)
    // {
    //     echo "Current Hand: ", $this->getCards($player->getHand()), "\n\n";
    // }
    // public function Match(Player $player, Card $card1, Card $card2)
    // {
    //     echo sprintf("%s, you have a match: %s and %s\n", $player->getName(), $this->getCard($card1), $this->getCard($card2));
    // }    
        
// class CalculateScore 
// {
//     private $player;
//     private $playerScore;
//     private $dealer;
//     private $dealerScore;


//     public function __construct(Player $player)
//     {
//         $this->player = $player;
//         $this->score = 0;
//     }


//     public function getPlayer()
//     {
//         return $this->player;
//     }

//     public function getDealer()
//     {
//         return $this->dealer;
//     }

   
//     public function Score()
//         {

    
  
//         } 
//    }


try {
    $deck = Deck::CreateDeck();
    var_dump($deck);
}
catch (InvalidArgumentException $xcp) 
{
    echo $xcp->getMessage();
}

//return the value of the card
// public $returnValue()


?>