<?php
/**
 * AkismetComponent is Yii component for Akismet
 *
 * Based on https://github.com/achingbrain/php5-akismet
 *
 * @author Mikhail Chemezov <michlenanosoft@gmail.com>
 * @link https://github.com/chemezov/AkismetComponent
 * @version 1.0
 */

require_once dirname(__FILE__) . '/Akismet.class.php';

class AkismetComponent extends CComponent
{
	/**
	 * @var Akismet
	 */
	private $_akismet;

	/**
	 * @var string Blog URL
	 */
	public $blogUrl;

	/**
	 * @var string API Key
	 */
	public $apiKey;

	/**
	 * @return Akismet
	 */
	public function init()
	{
		$this->_akismet = new Akismet($this->blogUrl, $this->apiKey);
	}

	/** Setters */

	/**
	 * @param string $commentAuthor
	 */
	public function setCommentAuthor($commentAuthor)
	{
		$this->_akismet->setCommentAuthor($commentAuthor);
	}

	/**
	 * @param string $authorEmail
	 */
	public function setCommentAuthorEmail($authorEmail)
	{
		$this->_akismet->setCommentAuthorEmail($authorEmail);
	}

	/**
	 * @param string $commentBody
	 */
	public function setCommentContent($commentBody)
	{
		$this->_akismet->setCommentContent($commentBody);
	}

	/**
	 * @param string $permalink
	 */
	public function setPermalink($permalink)
	{
		$this->_akismet->setPermalink($permalink);
	}

	/**
	 * @param string $authorURL
	 */
	public function setCommentAuthorURL($authorURL)
	{
		$this->_akismet->setCommentAuthorURL($authorURL);
	}

	/**
	 * @param string $userAgent
	 */
	public function setCommentUserAgent($userAgent)
	{
		$this->_akismet->setCommentUserAgent($userAgent);
	}

	/**
	 * @param string $userip
	 */
	public function setUserIP($userip)
	{
		$this->_akismet->setUserIP($userip);
	}

	/**
	 * Tests for spam.
	 *
	 * Uses the web service provided by {@link http://www.akismet.com Akismet} to see whether or not the submitted comment is spam.  Returns a boolean value.
	 *
	 * @return    bool      True if the comment is spam, false if not
	 * @throws    exception Will throw an exception if the API key passed to the constructor is invalid.
	 */
	public function isCommentSpam()
	{
		return $this->_akismet->isCommentSpam();
	}

	public function submitSpam()
	{
		$this->_akismet->submitSpam();
	}

	public function submitHam()
	{
		$this->_akismet->submitHam();
	}
}